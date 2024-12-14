<?php $__env->startSection('main-content'); ?>

<!--------------- login-section --------------->

<form method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">Log In</h5>
                    <div class="review-inner-form">
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" value="<?php echo e(old('email')); ?>" id="email" name="email" class="form-control" placeholder="Email">
                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        </div>
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                        </div>
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" id="remember">
                                <label for="remember" class="address">Remember Me</label>
                            </div>
                            <div class="forget-pass">
                                <p><a href="<?php echo e(route('password.request')); ?>">Forgot password?</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="login-btn text-center">
                        <button type="submit" class="shop-btn">Log In</button>
                        <span class="shop-account">Don't have an account? <a href="create-account.html">Sign Up Free</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<!--------------- login-section-end --------------->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.body.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owaismart\resources\views/auth/login.blade.php ENDPATH**/ ?>