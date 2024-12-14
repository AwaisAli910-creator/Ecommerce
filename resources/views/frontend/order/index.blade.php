@extends('frontend.body.main')

@section('main-content')
<section class="order-confirmation">
    <div class="container">
        <h1>Order Confirmation</h1>
        <p>Thank you for your order, {{ $order->fname }}!</p>
        <p>Your order ID is: {{ $order->id }}</p>
        <p>Total Amount: ${{ $order->total }}</p>
        <!-- Add more details if necessary -->
    </div>
</section>
@endsection
