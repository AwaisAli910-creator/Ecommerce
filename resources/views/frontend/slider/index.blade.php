<!--------------- hero-section ---------------> 
<section id="hero" class="hero">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper hero-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide hero-slider-one" style="background-image: url(/uploads/slider_img/{{$slider->img}})">
                    <div class="container">
                        <div class="col-lg-6">
                            <div class="wrapper-section" data-aos="fade-up">
                                <div class="wrapper-info">
                                    <h5 class="wrapper-subtitle">UP TO <span class="wrapper-inner-title">70%</span> OFF</h5>
                                    <h1 class="wrapper-details">{{ $slider->heading }}</h1>
                                    <a href="product-sidebar.html" class="shop-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Include Swiper JS -->
{{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.hero-swiper', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        loop: true, // Enable looping to cycle through slides
        autoplay: {
            delay: 3000, // Change slides every 3 seconds
            disableOnInteraction: false, // Keep autoplay running after user interactions
        },
        slidesPerView: 1, // Show one slide at a time
        spaceBetween: 10, // Space between slides
    });
});
</script --}}

 

<!--------------- hero-section-end --------------->
