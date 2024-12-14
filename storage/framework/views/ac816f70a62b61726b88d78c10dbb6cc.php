

<?php $__env->startSection('main-content'); ?>

    <!--------------- hero-section --------------->
    <?php echo $__env->make('frontend.slider.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--------------- hero-section-end --------------->

    <!--------------- style-section --------------->
    <section class="product fashion-style">
        <div class="container">
            <div class="style-section">
                <div class="row gy-4 gx-5 gy-lg-0">
                    <div class="col-lg-6">
                        <div class="product-wrapper wrapper-one" data-aos="fade-right">
                            <div class="wrapper-info">
                                <span class="wrapper-subtitle">NEW STYLE</span>
                                <h4 class="wrapper-details">Get 65% Offer
                                    <span class="wrapper-inner-title">& Make New</span> Fusion.
                                </h4>
                                <a href="product-sidebar.html" class="shop-btn">Shop Now
                                    <span>
                                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                                transform="rotate(45 1.45312 0.914062)" />
                                            <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                                transform="rotate(135 8 7.45703)" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-wrapper wrapper-two" data-aos="fade-up">
                            <div class="wrapper-info">
                                <span class="wrapper-subtitle">Mega OFFER</span>
                                <h4 class="wrapper-details">
                                    Make your New
                                    <span class="wrapper-inner-title">Styles with Our</span>
                                    Products
                                </h4>
                                <a href="product-sidebar.html" class="shop-btn">Shop Now
                                    <span>
                                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                                transform="rotate(45 1.45312 0.914062)" />
                                            <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                                transform="rotate(135 8 7.45703)" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- style-section-end --------------->

    <!--------------- category-section--------------->
        <?php echo $__env->make('frontend.category.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--------------- category-section-end--------------->

    
    <!--------------- arrival-section--------------->
    <?php echo $__env->make('frontend.new_arrival.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--------------- arrival-section-end--------------->

    <!--------------- flash-section--------------->
   <?php echo $__env->make('frontend.flashsale.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--------------- flash-section-end--------------->

    <!--------------- top-sell-section--------------->
   
    <!--------------- top-sell-section-end--------------->

    
    <!--------------- best-sell-section-end--------------->

    <!--------------- weekly-section--------------->
    <?php echo $__env->make('frontend.bestsale.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--------------- weekly-section-end--------------->

    <!--------------- flash-section--------------->
    
    <!--------------- flash-section-end--------------->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.body.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owaismart\resources\views/frontend/home.blade.php ENDPATH**/ ?>