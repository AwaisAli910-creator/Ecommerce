@extends('frontend.body.main')

@section('main-content')
<!--------------- blog-tittle-section---------------->
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="/">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Cart</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Cart</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<!--------------- cart-section---------------->
<section class="product-cart product footer-padding">
    <div class="container">
        <div class="cart-section">
            @if($Carts->isEmpty())
                <div class="empty-cart">
                    <h5>Your cart is currently empty.</h5>
                    <a href="/" class="shop-btn">Continue Shopping</a>
                </div>
            @else
                <table>
                    <tbody>
                        <tr class="table-row table-top-row">
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">PRODUCT Image</h5>
                            </td>
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">Product</h5>
                            </td>
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">Price</h5>
                            </td>
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">Quantity</h5>
                            </td>
                            <td class="table-wrapper">
                                <h5 class="table-heading">Total</h5>
                            </td>
                            <td class="table-wrapper">
                                <h5 class="table-heading">Action</h5>
                            </td>
                        </tr>
                        @foreach ($Carts as $Cart)
                        <tr class="table-row table-top-row">
                            <td class="table-wrapper wrapper-product">
                                <div class="wrapper-img">
                                    <img src="/uploads/products_img/{{ $Cart->prod_img }}" alt="img" style="width: 100%;">
                                </div>
                            </td>
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">{{ $Cart->prod }}</h5>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">{{ $Cart->price }}</h5>
                                </div>
                            </td>
                            {{-- <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">{{ $Cart->qty }}</h5>
                                </div>
                            </td> --}}
                            <td class="table-wrapper" style="border: 1px solid #ccc; padding: 10px; text-align: center;">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading" style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                                        <button class="quantity-btn" onclick="updateQuantity(-1)" style="font-size: 20px; padding: 5px 10px; border: 1px solid #ccc; cursor: pointer; background-color: #f0f0f0; transition: background-color 0.3s;">
                                            &#8211;
                                        </button>
                                        <span id="quantity-display">{{ $Cart->qty }}</span>
                                        <button class="quantity-btn" onclick="updateQuantity(1)" style="font-size: 20px; padding: 5px 10px; border: 1px solid #ccc; cursor: pointer; background-color: #f0f0f0; transition: background-color 0.3s;">
                                            &#43;
                                        </button>
                                    </h5>
                                </div>
                            </td>
                            
                            <script>
                                function updateQuantity(change) {
                                    var quantityDisplay = document.getElementById('quantity-display');
                                    var currentQty = parseInt(quantityDisplay.innerText);
                            
                                    // Update the quantity based on the button clicked
                                    var newQty = currentQty + change;
                            
                                    // Prevent quantity from going below 1
                                    if (newQty < 1) newQty = 1;
                            
                                    // Update the quantity display
                                    quantityDisplay.innerText = newQty;
                            
                                    // Optional: Update the cart on the server (uncomment and modify if needed)
                                    /*
                                    fetch('/update-cart', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify({ quantity: newQty, cartId: '{{ $Cart->id }}' })
                                    }).then(response => response.json())
                                      .then(data => {
                                          // Handle the response if needed
                                      });
                                    */
                                }
                            </script>
                            
                            <td class="table-wrapper wrapper-total">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">{{ $Cart->total }}</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <form action="{{ route('cart.remove', $Cart->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="wishlist-btn cart-btn">
            @if(!$Carts->isEmpty())
                <form id="clear-cart-form" action="{{ route('cart.clear') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="button" class="clean-btn" onclick="event.preventDefault(); this.form.submit();">
                        Clear Cart
                    </button>
                </form>

                <a href="{{route('checkout.index')}}" class="shop-btn">Proceed to Checkout</a>
            @endif
        </div>

    </div>
</section>
<!--------------- cart-section-end---------------->
@endsection
