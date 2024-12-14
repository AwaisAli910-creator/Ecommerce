{{-- <form action="{{ route('cart.add', $product->id) }}" method="post">
    @csrf
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit">Add to Cart</button>
</form> --}}

@extends('frontend.body.main')

@section('main-content')
<!--------------- blog-title-section---------------->
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="/">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Add to Cart</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Add to Cart</h1>
        </div>
    </div>
</section>
<!--------------- blog-title-section-end---------------->

<!--------------- add-to-cart-section---------------->
<section class="product-cart product footer-padding">
    <div class="container">
        <div class="add-to-cart-section">
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-image">
                            <img src="/uploads/products_img/{{ $product->prod_img }}" alt="Product Image" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $product->prod_title }}</h2>
                        <p>Price: <strong>{{ $product->price }}</strong></p>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="qty" id="quantity" value="1" min="1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Your Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Your Address:</label>
                            <textarea name="address" id="address" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--------------- add-to-cart-section-end---------------->
@endsection
