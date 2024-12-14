<section class="product-category">
    <div class="container mb-5">
        <div class="section-title">
            <h5>Our Categories</h5>
            <a href="product-sidebar.html" class="view">View All</a>
        </div>
        <div class="category-section">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                <div class="wrapper-img">
                    <img src="/uploads/category_img/<?php echo e($category->b_img); ?>" style="width: 80px"  alt="dress">
                </div>
                <div class="wrapper-info">
                    <a href="product-sidebar.html" class="wrapper-details"><?php echo e($category->title); ?></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            
            
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\owaismart\resources\views/frontend/category/index.blade.php ENDPATH**/ ?>