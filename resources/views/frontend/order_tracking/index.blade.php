@extends('frontend.body.main')

@section('main-content')

<!-- Custom CSS for this page -->
<style>
    /* Custom input field size */
    .custom-input {
        font-size: 18px;        /* Font size ko barhane se input text readable hoga */
        height: 50px;           /* Input field ki height barhayi gayi */
        padding: 10px;          /* Thoda padding di gayi */
    }

    /* Custom button size and margin */
    .custom-btn {
        padding: 12px 20px;     /* Button ki padding badhayi gayi */
        font-size: 18px;        /* Button ka font size barhaya gaya */
        margin-top: 20px;       /* Track Order button ke upar margin add kiya gaya */
        margin-bottom: 70px;
    }
</style>

<div class="container my-5">
    <h1 class="text-center mb-4">Track Your Order</h1>

    <!-- Display validation errors -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Tracking Form -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('ordertracking.index') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="track-number">Enter your Tracking Number:</label>
                    <input type="text" name="track-number" id="track-number" class="form-control custom-input" placeholder="Tracking Number" required>
                </div>
                <div class="form-group">
                    <label for="phone-number">Or Enter your Phone Number:</label>
                    <input type="text" name="phone-number" id="phone-number" class="form-control custom-input" placeholder="Phone Number" required>
                </div>
                <button type="submit" class="btn btn-primary mt-4 custom-btn">Track Order</button>
            </form>
        </div>
    </div>

    <!-- Display order details if found -->
    @if(isset($order))
    <div class="order-details mt-5">
        <h2 class="text-center">Order Status</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Order Number:</strong> {{ $order->order_number }}</li>
                    <li class="list-group-item"><strong>Phone Number:</strong> {{ $order->customer_phone }}</li>
                    <li class="list-group-item"><strong>Status:</strong> {{ $order->order_status }}</li>
                    <li class="list-group-item"><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</li>
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
