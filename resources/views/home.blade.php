<style>

.cart-modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.4);
    z-index:999;
}

.cart-modal-content{
    width:700px;
    max-width:90%;
    background:white;
    margin:60px auto;
    border-radius:20px;
    padding:25px;
}

.modal-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.close-btn{
    background:red;
    color:white;
    border:none;
    width:35px;
    height:35px;
    border-radius:50%;
    cursor:pointer;
    font-size:20px;
}

</style>
@extends('layouts.app')

@section('content')
    <div class="cards">
        <div class="card">
            <small>Total Sales</small>
            <h2>$25,400</h2>
        </div>

        <div class="card">
            <small>Orders</small>
            <h2>320</h2>
        </div>

        <div class="card">
            <small>Customers</small>
            <h2>125</h2>
        </div>

        <div class="card">
            <small>Products</small>
            <h2>580</h2>
        </div>
    </div>

    <div class="content">
        <div class="products">
            <div class="products-header">
                <h2>Products</h2>
                <input type="text" class="barcode-input" placeholder="Scan barcode...">
            </div>
            <div class="product-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            {{ $product->name }}
                        </div>

                        <div class="product-info">
                            <h4>{{ $product->name }}</h4>
                            <div class="price-row">
                                <div class="price">${{ $product->price }}</div>
                                <button class="add-btn"
                                        onclick="addToCart('{{ $product->name }}', {{ $product->price }})">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        
        </div>

        <!-- Cart Button -->

        <div class="cart">
            <h2 style="text-align: center;">Order Summary</h2>
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: #6E6EAA; color: white;">
                    <tr>
                        <th style="padding:14px;">Product</th>
                        <th style="padding:14px;">Qty</th>
                        <th style="padding:14px;">Amount</th>
                    </tr>
                </thead>

                <tbody id="cart-body">
                    <tr style="margin-bottom: 10px; border-bottom: 1px solid #ddd;">
                    <td style="width: 100px; text-align: left;border:none;padding: 14px;"></td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">Total:
                    </td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">$0</td>
            </tr>
                </tbody>
            </table>

            <button class="checkout-btn" onclick="openCartModal()">
                Confirm Payment
            </button>
        </div>


        <!-- Modal -->

        <div id="cart-modal" class="cart-modal">

            <div class="cart-modal-content">

                <div class="modal-header">

                    <h2 style="text-align: center;">Cart Details</h2>

                    <button onclick="closeCartModal()" class="close-btn">
                        ×
                    </button>

                </div>

                <table style="width:100%; border-collapse:collapse;">

                    <thead style="background:#6E6EAA;color:white;">
                        <tr>
                            <th style="padding:14px;">Product</th>
                            <th style="padding:14px;">Qty</th>
                            <th style="padding:14px;">Amount</th>
                        </tr>
                    </thead>

                    <tbody id="modal-cart-body">

                    </tbody>

                </table>
                <button class="checkout-btn">
                    Complete Payment
                </button>

            </div>

        </div>
    </div>
@endsection

<script>
    let cart = {};

   function addToCart(name, price)
    {
        if (cart[name])
        {
            cart[name].qty += 1;
        }
        else
        {
            cart[name] = {
                name: name,
                price: price,
                qty: 1
            };
        }

        renderCart();
    }

    function increaseQty(name)
    {
        cart[name].qty++;

        renderCart();
    }

    function decreaseQty(name)
    {
        cart[name].qty--;

        if (cart[name].qty <= 0)
        {
            delete cart[name];
        }

        renderCart();
    }
    function renderCart()
    {
        let tbody = document.getElementById('cart-body');
        tbody.innerHTML = '';

        let total = 0;

        Object.values(cart).forEach(item => {

            let amount = item.qty * item.price;
            total += amount;

            tbody.innerHTML += `
                <tr style="margin-bottom: 10px; border-bottom: 1px solid #ddd;">
                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">${item.name}</td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">
                        <button style="width: 20px" onclick="decreaseQty('${item.name}')">-</button>
                        ${item.qty}
                        <button style="width: 20px" onclick="increaseQty('${item.name}')">+</button>
                    </td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">$${amount}</td>
                </tr>
            `;
        });

        tbody.innerHTML +=
            `
            <tr style="margin-bottom: 10px; border-bottom: 1px solid #ddd;">
                    <td style="width: 100px; text-align: left;border:none;padding: 14px;"></td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">Total:
                    </td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">$${total}</td>
            </tr>`;
    }

    function openCartModal()
    {
        document.getElementById('cart-modal').style.display = 'block';

        renderModalCart();
    }

    function closeCartModal()
    {
        document.getElementById('cart-modal').style.display = 'none';
    }

    function renderModalCart()
    {
        let tbody = document.getElementById('modal-cart-body');

        tbody.innerHTML = '';

        let total = 0;

        Object.values(cart).forEach(item => {

            let amount = item.qty * item.price;

            total += amount;

            tbody.innerHTML += `
                <tr>
                    <td style="padding:14px;">${item.name}</td>

                    <td style="padding:14px;">
                        ${item.qty}
                    </td>

                    <td style="padding:14px;">
                        $${amount}
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML += `
            <tr>
                <td></td>

                <td style="padding:14px;">
                    <strong>Total:</strong>
                </td>

                <td style="padding:14px;">
                    <strong>$${total}</strong>
                </td>
            </tr>
        `;
    }
</script>