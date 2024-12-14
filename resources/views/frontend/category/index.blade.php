<section class="product-category">
    <div class="container mb-5">
        <div class="section-title">
            <h5>Our Categories</h5>
            <a href="product-sidebar.html" class="view">View All</a>
        </div>
        <div class="category-section">
            @foreach ($categories as $category)
                
            <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                <div class="wrapper-img">
                    <img src="/uploads/category_img/{{$category->b_img}}" style="width: 80px"  alt="dress">
                </div>
                <div class="wrapper-info">
                    <a href="product-sidebar.html" class="wrapper-details">{{$category->title}}</a>
                </div>
            </div>
            @endforeach
           
            
            
        </div>
    </div>
</section>