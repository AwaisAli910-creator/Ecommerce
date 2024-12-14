

<?php $__env->startSection('main-content'); ?>
    <section class="order-success">
        <div class="container">
            <div class="order-success-message" style="padding: 30px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); margin-top: 30px;">
                <!-- Success message -->
                <div class="alert alert-success text-center">
                    <h1><?php echo e(session('status', 'Your order has been placed successfully!')); ?></h1>
                    <p class="lead">Thank you for shopping with us. We appreciate your order!</p>
                </div>

                <!-- Order details -->
                <div class="order-details">
                    <h3>Order Details</h3>
                    <div class="order-summary-box" style="background-color: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
                        <div class="order-summary-item" style="font-size: 16px; line-height: 1.6; padding: 10px 0; border-bottom: 1px solid #f0f0f0;">
                            <p><strong>Order Number:</strong> <span style="font-weight: bold; color: #555;"><?php echo e($order->order_number); ?></span></p>
                        </div>
                        <div class="order-summary-item" style="font-size: 16px; line-height: 1.6; padding: 10px 0; border-bottom: 1px solid #f0f0f0;">
                            <p><strong>Payment Method:</strong> <span style="font-weight: bold; color: #555;"><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_method))); ?></span></p>
                        </div>
                        
                    </div>

                    <!-- Product details -->
                    <h4 class="mt-4">Products:</h4>
                    <ul class="order-items" style="list-style-type: none; padding-left: 0;">
                        <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="order-item" style="background-color: #f9f9f9; margin-bottom: 10px; padding: 15px; border-radius: 8px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);">
                                <div class="product-info">
                                    <p style="font-size: 14px; margin-bottom: 8px; color: #666;"><strong>Product Name:</strong> <?php echo e($item->product_name); ?></p>
                                    <p style="font-size: 14px; margin-bottom: 8px; color: #666;"><strong>Quantity:</strong> <?php echo e($item->quantity); ?></p>
                                    <p style="font-size: 14px; margin-bottom: 8px; color: #666;"><strong>Price:</strong> $<?php echo e(number_format($item->product_price, 2)); ?></p>
                                    <p style="font-size: 14px; margin-bottom: 8px; color: #666;"><strong>Total:</strong> $<?php echo e(number_format($item->total_price, 2)); ?></p>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <!-- Order summary section -->
                    <div class="order-summary-box mt-4" style="background-color: #fff; padding: 20px; margin-bottom: 85px; border-radius: 8px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
                        <div class="order-summary-item d-flex justify-content-between" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #f0f0f0;">
                            <p style="margin: 0; font-size: 16px;"><strong>Subtotal:</strong></p>
                            <p style="margin: 0; font-size: 16px;">$<?php echo e(number_format($totalPrice, 2)); ?></p>
                        </div>
                        <div class="order-summary-item d-flex justify-content-between" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #f0f0f0;">
                            <p style="margin: 0; font-size: 16px;"><strong>Shipping:</strong></p>
                            <p style="margin: 0; font-size: 16px;">Free Shipping</p>
                        </div>
                        <div class="order-summary-item d-flex justify-content-between total-amount" style="display: flex; justify-content: space-between; align-items: center; font-size: 18px; font-weight: bold; color: #333; border-top: 2px solid #f0f0f0; padding-top: 15px;">
                            <p style="margin: 0;"><strong>Total Amount:</strong></p>
                            <p style="margin: 0;">$<?php echo e(number_format($totalPrice, 2)); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Go back to home button -->
                
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.body.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owaismart\resources\views/frontend/checkout/order_success.blade.php ENDPATH**/ ?>