<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML, html, bootstrap template, free template, figma, web design, web development, front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo e(asset('frontend/assets/images/homepage-one/icon.png')); ?>">

    <title>Shopus: Your One-Stop Destination for Fashion and Style</title>

    <!--------------- swiper-css ---------------->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/swiper10-bundle.min.css')); ?>">

    <!--------------- bootstrap-css ---------------->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap-5.3.2.min.css')); ?>">

    <!---------------------- Range Slider ------------------->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/nouislider.min.css')); ?>">

    <!---------------------- Scroll ------------------------>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/aos-3.0.0.css')); ?>">

    <!--------------- additional-css --------------------->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/style.css')); ?>">

</head>

<body>

    <!--------------- header-section --------------->    
    <?php echo $__env->make('frontend.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--------------- header-section-end --------------->

    <!--------------- hero-section --------------->    
    <?php echo $__env->yieldContent('main-content'); ?>
    <!--------------- hero-section-end --------------->

    <!--------------- style-section --------------->    
    <?php echo $__env->make('frontend.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--------------- jQuery ---------------->
    <script src="<?php echo e(asset('frontend/assets/js/jquery_3.7.1.min.js')); ?>"></script>

    <!--------------- bootstrap-js ---------------->
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap_5.3.2.bundle.min.js')); ?>"></script>

    <!--------------- Range-Slider-js ---------------->
    <script src="<?php echo e(asset('frontend/assets/js/nouislider.min.js')); ?>"></script>

    <!--------------- scroll-Animation-js ---------------->
    <script src="<?php echo e(asset('frontend/assets/js/aos-3.0.0.js')); ?>"></script>

    <!--------------- swiper-js ---------------->
    <script src="<?php echo e(asset('frontend/js/swiper10-bundle.min.js')); ?>"></script>

    <!--------------- additional-js ---------------->
    <script src="<?php echo e(asset('frontend/assets/js/shopus.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\owaismart\resources\views/frontend/body/main.blade.php ENDPATH**/ ?>