<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::query();

        $fromDate = $request->query('from_date');
        $toDate = $request->query('to_date');

        if ($fromDate) {
            $query->where('date', '>=', $fromDate);
        }

        if ($toDate) {
            $query->where('date', '<=', $toDate);
        }

        $reports = $query->orderBy('date', 'desc')->get();

        $summary = [
            'sales' => $reports->sum('sales'),
            'orders' => $reports->sum('orders'),
            'customers' => $reports->sum('customers'),
            'products' => $reports->sum('products'),
            'revenue' => $reports->sum('revenue'),
        ];

        return view('reports', compact('reports', 'summary', 'fromDate', 'toDate'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'sales' => 'required|integer|min:0',
            'orders' => 'required|integer|min:0',
            'customers' => 'required|integer|min:0',
            'products' => 'required|integer|min:0',
            'revenue' => 'required|numeric|min:0',
        ]);

        Report::create($validated);

        return redirect('/reports')->with('success', 'Report created successfully.');
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);

        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $validated = $request->validate([
            'date' => 'required|date',
            'sales' => 'required|integer|min:0',
            'orders' => 'required|integer|min:0',
            'customers' => 'required|integer|min:0',
            'products' => 'required|integer|min:0',
            'revenue' => 'required|numeric|min:0',
        ]);

        $report->update($validated);

        return redirect('/reports')->with('success', 'Report updated successfully.');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect('/reports')->with('success', 'Report deleted successfully.');
    }
}
