


<?php $__env->startSection('content'); ?>
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
                                    $<?php echo e($product->price); ?>

                                </div>

                                <button class="add-btn"
                                        onclick="addToCard('<?php echo e($product->name); ?>', <?php echo e($product->price); ?>)">
                                    Add
                                </button>
                            </div>
                        </div>

                        <input type="hidden" class="product-id" value="<?php echo e($product->id); ?>">

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

                    <td style="width: 100px; text-align: left;border:none;padding: 14px;">$0</td>
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
                            value="<?php echo e(date('Y-m-d')); ?>" style="width:100px;">
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
                <button class="checkout-btn">
                    Complete Payment
                </button>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
    let card = {};

   function addToCard(name, price)
    {
        if (card[name])
        {
            card[name].qty += 1;
        }
        else
        {
            card[name] = {
                name: name,
                price: price,
                qty: 1
            };
        }

        renderCard();
    }

    function increaseQty(name)
    {
        card[name].qty++;

        renderCard();
    }

    function decreaseQty(name)
    {
        card[name].qty--;

        if (card[name].qty <= 0)
        {
            delete card[name];
        }

        renderCard();
    }
    function renderCard()
    {
        let tbody = document.getElementById('card-body');
        tbody.innerHTML = '';

        let total = 0;

        Object.values(card).forEach(item => {

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

    function openCardModal()
    {
        document.getElementById('card-modal').style.display = 'flex';

        renderModalCard();
    }

    function closeCardModal()
    {
        document.getElementById('card-modal').style.display = 'none';
    }

    function renderModalCard()
    {
        let tbody = document.getElementById('modal-card-body');

        tbody.innerHTML = '';

        let total = 0;

        Object.values(card).forEach(item => {

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

    document.addEventListener('DOMContentLoaded', function()
    {
        const searchBox = document.getElementById('search-box');

        searchBox.addEventListener('keyup', function()
        {
            const value = this.value.toLowerCase();

            document.querySelectorAll('.product-card').forEach(function(card)
            {
                const name = card.dataset.name;

                if (name.includes(value))
                {
                    card.style.display = 'block';
                }
                else
                {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/dashboard.blade.php ENDPATH**/ ?>