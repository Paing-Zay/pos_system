<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        $sales     = Sale::with('saleItems')->latest()->get();
        $saleItems = SaleItem::with('sale', 'product')->latest()->get();

        return view('sales', compact('sales', 'saleItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name'      => 'nullable|string|max:255',
            'order_date'         => 'nullable|date',
            'status'             => 'required|string|in:paid,partial,unpaid',
            'pay_amount'         => 'required|numeric|min:0',
            'items'              => 'required|array|min:1',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.name'       => 'required|string|max:255',
            'items.*.price'      => 'required|numeric|min:0',
            'items.*.qty'        => 'required|integer|min:1',
        ]);

        $sale = DB::transaction(function () use ($validated) {
            $totalAmount = collect($validated['items'])->sum(function ($item) {
                return $item['price'] * $item['qty'];
            });

            $payAmount = $validated['pay_amount'];
            if ($validated['status'] === 'paid') {
                $payAmount = $totalAmount;
            } elseif ($validated['status'] === 'unpaid') {
                $payAmount = 0;
            }
            $payAmount = min($payAmount, $totalAmount);
            $dueAmount = $totalAmount - $payAmount;

            $sale = new Sale();
            $sale->customer_name = $validated['customer_name'];
            $sale->status        = $validated['status'] === 'paid' ? 1 : ($validated['status'] === 'partial' ? 2 : 0);
            $sale->total_amount  = $totalAmount;
            $sale->pay_amount    = $payAmount;
            $sale->due_amount    = $dueAmount;
            $sale->save();

            foreach ($validated['items'] as $item) {
                $saleItem             = new SaleItem();
                $saleItem->sale_id    = $sale->id;
                $saleItem->product_id = $item['product_id'];
                $saleItem->quantity   = $item['qty'];
                $saleItem->price      = $item['price'];
                $saleItem->save();
            }

            return $sale;
        });

        return response()->json([
            'success' => true,
            'sale_id' => $sale->id,
        ]);
    }
}
