


<?php $__env->startSection('content'); ?>
    <div class="cards">
        <div class="card">
            <small>Total Sales</small>
            <h2>Ks25,400</h2>
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
            <h2><?php echo e($products->count()); ?></h2>
        </div>
    </div>

    <div class="content">
        <div class="products">

            <div class="products-header">
                <h2>Products</h2>
                <input type="text" id="search-box" class="search-box" placeholder="Search product...">
            </div>

            <div class="product-grid">

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-card"
                        data-name="<?php echo e(strtolower($product->name)); ?>">

                        <div class="product-image">
                            <?php echo e($product->name); ?>

                        </div>

                        <div class="product-info">
                            <h4><?php echo e($product->name); ?></h4>

                            <div class="price-row">
                                <div class="price">
                                    <?php echo e($product->price); ?> Ks
                                </div>

                                <button class="add-btn"
                                        onclick="addToCart(<?php echo e($product->id); ?>, '<?php echo e(addslashes($product->name)); ?>', <?php echo e($product->price); ?>)">
                                    Add
                                </button>
                            </div>
                        </div>

                        <input type="hidden" class="product-id" value="<?php echo e($product->id); ?>">

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div id="not-found" style="display:none; padding:20px; text-align:center; color:#888; font-size:20px;">
                        Product not found
                    </div>
        </div>

        <!-- Card Button -->

        <div class="card">
            <h2 style="text-align: center;">Order Summary</h2>
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: #6E6EAA; color: white;">
                    <tr>
                        <th style="padding:14px;">Product</th>
                        <th style="padding:14px;">Qty</th>
                        <th style="padding:14px;">Amount</th>
                    </tr>
                </thead>

                <tbody id="card-body">
                    <tr style="margin-bottom: 10px; border-bottom: 1px solid #ddd;">
                    <td style="width: 100px; text-align: left;border:none;padding: 14px;"></td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">Total:
                    </td>

                    <td style="width: 100px; text-align: right;border:none;padding: 14px;">0 Ks</td>
            </tr>
                </tbody>
            </table>

            <button class="checkout-btn" onclick="openCardModal()">
                Confirm Payment
            </button>
        </div>


        <!-- Modal -->
        <div id="card-modal" class="card-modal">

            <div class="card-modal-content">

                <div class="modal-header">

                    <h2 class="modal-title">Card Details</h2>

                    <button onclick="closeCardModal()" class="close-btn">
                        ×
                    </button>

                </div>

                <!-- Customer Info -->
                <div class="customer-info">

                    <!-- Customer Name -->
                    <div class="input-group">
                        <label><strong>Customer Name</strong></label>
                        <input type="text"
                            id="customer-name"
                            placeholder="Enter customer name" style="width:200px;">
                    </div>

                    <!-- Date -->
                    <div class="input-group">
                        <label><strong>Date</strong></label>
                        <input type="date"
                            id="order-date"
                            value="<?php echo e(date('Y-m-d')); ?>" style="width:200px;">
                    </div>

                    <!-- Payment Status -->
                    <div class="input-group">
                        <label><strong>Payment Status</strong></label>
                        <select id="payment-status" style="width:200px; padding: 8px; border-radius: 6px;">
                            <option value="paid">Paid</option>
                            <option value="partial">Partial</option>
                            <option value="unpaid">Unpaid</option>
                        </select>
                    </div>

                    <!-- Auto Payment Summary -->
                    <div class="input-group">
                        <label><strong>Paid Amount</strong></label>
                        <input type="text" id="paid-amount" min="0" step="0.01" style="width:200px; background:#f4f4f4;">
                    </div>

                    <div class="input-group">
                        <label><strong>Due Amount</strong></label>
                        <input type="text" id="due-amount" readonly style="width:200px; background:#f4f4f4;">
                    </div>

                </div>

                <!-- Table -->
                <div class="table-wrapper">

                    <table class="cart-table">

                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>

                        <tbody id="modal-card-body">

                        </tbody>

                    </table>

                </div>

                <!-- Button -->
                <button class="checkout-btn" onclick="completePayment()">
                    Complete Payment
                </button>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
    const csrfToken = '<?php echo e(csrf_token()); ?>';
    const salesCompleteUrl = '<?php echo e(url('/sales/complete')); ?>';
    let cart = {};

    function addToCart(productId, name, price)
    {
        const key = productId.toString();

        if (cart[key])
        {
            cart[key].qty += 1;
        }
        else
        {
            cart[key] = {
                product_id: productId,
                name: name,
                price: price,
                qty: 1
            };
        }

        renderCard();
    }

    function increaseQty(productId)
    {
        const key = productId.toString();
        cart[key].qty++;
        renderCard();
    }

    function decreaseQty(productId)
    {
        const key = productId.toString();
        cart[key].qty--;

        if (cart[key].qty <= 0)
        {
            delete cart[key];
        }

        renderCard();
    }

    function renderCard()
    {
        let tbody = document.getElementById('card-body');
        tbody.innerHTML = '';

        let total = 0;

        Object.values(cart).forEach(item => {
            let amount = item.qty * item.price;
            total += amount;

            tbody.innerHTML += `
                <tr style="margin-bottom: 10px; border-bottom: 1px solid #ddd;">
                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">${item.name}</td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">
                        <button style="width: 20px" onclick="decreaseQty(${item.product_id})">-</button>
                        ${item.qty}
                        <button style="width: 20px" onclick="increaseQty(${item.product_id})">+</button>
                    </td>

                    <td style="width: 100px; text-align: right;border:none;padding: 14px;">${amount} Ks</td>
                </tr>
            `;
        });

        tbody.innerHTML +=
            `
            <tr style="margin-bottom: 10px; border-bottom: 1px solid #ddd;">
                    <td style="width: 100px; text-align: left;border:none;padding: 14px;"></td>

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">Total:
                    </td>

                    <td style="width: 100px; text-align: right;border:none;padding: 14px;">${total} Ks</td>
            </tr>`;
    }

    function openCardModal()
    {
        if (Object.keys(cart).length === 0)
        {
            alert('Please add at least one product before completing payment.');
            return;
        }

        document.getElementById('card-modal').style.display = 'flex';
        renderModalCard();
    }

    function closeCardModal()
    {
        document.getElementById('card-modal').style.display = 'none';
    }

    function updatePaymentSummary()
    {
        const status = document.getElementById('payment-status').value;
        const paidInput = document.getElementById('paid-amount');
        const total = Object.values(cart).reduce((sum, item) => sum + item.qty * item.price, 0);

        let paidAmount = 0;
        let dueAmount = total;

        if (status === 'paid') {
            paidInput.disabled = true;
            paidAmount = total;
            dueAmount = 0;
        } else if (status === 'unpaid') {
            paidInput.disabled = true;
            paidAmount = 0;
            dueAmount = total;
        } else {
            paidInput.disabled = false;
            let rawValue = parseFloat(paidInput.value);
            if (isNaN(rawValue) || rawValue < 0) {
                rawValue = 0;
            }
            if (rawValue > total) {
                rawValue = total;
            }
            paidInput.value = rawValue.toFixed(1);
            paidAmount = rawValue;
            dueAmount = total - paidAmount;
        }

        paidInput.value = `${paidAmount} Ks`;
        document.getElementById('due-amount').value = `${dueAmount} Ks`;
    }

    function renderModalCard()
    {
        let tbody = document.getElementById('modal-card-body');
        tbody.innerHTML = '';

        let total = 0;

        Object.values(cart).forEach(item => {
            let amount = item.qty * item.price;
            total += amount;

            tbody.innerHTML += `
                <tr>
                    <td style="padding:14px;">${item.name}</td>
                    <td style="padding:14px;">${item.qty}</td>
                    <td style="padding:14px; text-align: right;">${amount} Ks</td>
                </tr>
            `;
        });

        tbody.innerHTML += `
            <tr>
                <td></td>
                <td style="padding:14px;"><strong>Total:</strong></td>
                <td style="padding:14px; text-align: right;"><strong>${total} Ks</strong></td>
            </tr>
        `;

        updatePaymentSummary();
    }

    function completePayment()
    {
        if (Object.keys(cart).length === 0)
        {
            alert('Your cart is empty. Add products first.');
            return;
        }

        const customerName = document.getElementById('customer-name').value;
        const orderDate = document.getElementById('order-date').value;
        const status = document.getElementById('payment-status').value;
        const total = Object.values(cart).reduce((sum, item) => sum + item.qty * item.price, 0);
        const paidAmount = parseFloat(document.getElementById('paid-amount').value) || 0;
        const items = Object.values(cart).map(item => ({
            product_id: item.product_id,
            name: item.name,
            price: item.price,
            qty: item.qty,
        }));

        fetch(salesCompleteUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                customer_name: customerName,
                order_date: orderDate,
                status: status,
                pay_amount: paidAmount,
                due_amount: total - paidAmount,
                items: items,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success)
            {
                alert('Payment completed and sale saved successfully.');
                cart = {};
                renderCard();
                closeCardModal();
            }
            else
            {
                alert('Unable to save the sale. Please try again.');
            }
        })
        .catch(() => {
            alert('Unable to save the sale. Please try again.');
        });
    }

    document.addEventListener('DOMContentLoaded', function()
    {
        document.getElementById('payment-status').addEventListener('change', updatePaymentSummary);

        const paymentStatus = document.getElementById('payment-status');
        const paidAmountInput = document.getElementById('paid-amount');

        paymentStatus.addEventListener('change', updatePaymentSummary);
        paidAmountInput.addEventListener('input', updatePaymentSummary);

        const searchBox = document.getElementById('search-box');
        const notFound = document.getElementById('not-found');

        searchBox.addEventListener('keyup', function()
        {
            const value = this.value.toLowerCase();

            let found = false;

            document.querySelectorAll('.product-card').forEach(function(card)
            {
                const name = card.dataset.name;

                if (name.includes(value))
                {
                    card.style.display = 'block';
                    found = true;
                }
                else
                {
                    card.style.display = 'none';
                }
            });

            // show / hide not found message
            if (found)
            {
                notFound.style.display = 'none';
            }
            else
            {
                notFound.style.display = 'block';
            }
        });
    });
</script>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/dashboard.blade.php ENDPATH**/ ?>