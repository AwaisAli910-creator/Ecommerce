<!--------------- hero-section ---------------> 
<section id="hero" class="hero">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper hero-wrapper">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide hero-slider-one" style="background-image: url(/uploads/slider_img/<?php echo e($slider->img); ?>)">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">UP TO <span class="wrapper-inner-title">70%</span> OFF</h5>
                                    <h1 class="wrapper-details"><?php echo e($slider->heading); ?></h1>
                                    <a href="product-sidebar.html" class="shop-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Include Swiper JS -->


 

<!--------------- hero-section-end --------------->
<?php /**PATH C:\xampp\htdocs\owaismart\resources\views/frontend/slider/index.blade.php ENDPATH**/ ?>