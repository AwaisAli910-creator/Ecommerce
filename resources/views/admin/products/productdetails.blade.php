@extends('admin.admin_dashboard')
@section('admin')
<div class="card">
    <div class="row g-0">
        <div class="col-md-4 border-end">
            <img src="{{ asset('assets/images/products/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                @foreach($product->images as $image)
                    <div class="col">
                        <img src="{{ asset('assets/images/products/' . $image) }}" width="70" class="border rounded cursor-pointer" alt="">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title">{{ $product->name }}</h4>
                <div class="d-flex gap-3 py-3">
                    <div class="cursor-pointer">
                        @for($i = 0; $i < 5; $i++)
                            <i class='bx bxs-star {{ $i < $product->rating ? 'text-warning' : 'text-secondary' }}'></i>
                        @endfor
                    </div>  
                    <div>{{ $product->reviews_count }} reviews</div>
                    <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> {{ $product->orders_count }} orders</div>
                </div>
                <div class="mb-3"> 
                    <span class="price h4">${{ $product->price }}</span> 
                    <span class="text-muted">/per kg</span> 
                </div>
                <p class="card-text fs-6">{{ $product->description }}</p>
                <dl class="row">
                    <dt class="col-sm-3">Model#</dt>
                    <dd class="col-sm-9">{{ $product->model }}</dd>
                    
                    <dt class="col-sm-3">Color</dt>
                    <dd class="col-sm-9">{{ $product->color }}</dd>
                    
                    <dt class="col-sm-3">Delivery</dt>
                    <dd class="col-sm-9">{{ $product->delivery_info }}</dd>
                </dl>
                <hr>

                <!-- Form Start -->
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
                        <div class="col">
                            <label class="form-label">Quantity</label>
                            <div class="input-group input-spinner">
                                <button class="btn btn-white" type="button" id="button-plus"> + </button>
                                <input type="number" name="quantity" class="form-control" value="1" min="1">
                                <button class="btn btn-white" type="button" id="button-minus"> − </button>
                            </div>
                        </div> 
                        <div class="col">
                            <label class="form-label">Select size</label>
                            <div class="">
                                @foreach($product->sizes as $size)
                                    <label class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="select_size" value="{{ $size }}" required>
                                        <div class="form-check-label">{{ ucfirst($size) }}</div>
                                    </label>
                                @endforeach
                            </div>
                        </div> 
                        <div class="col">
                            <label class="form-label">Select Color</label>
                            <div class="color-indigators d-flex align-items-center gap-2">
                                @foreach($product->colors as $color)
                                    <div class="color-indigator-item" style="background-color: {{ $color }};"></div> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-3">
                        <button type="submit" class="btn btn-primary">Buy Now</button>
                        <button type="button" class="btn btn-outline-primary"><span class="text">Add to cart</span> <i class='bx bxs-cart-alt'></i></button>
                    </div>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
    <hr/>
    <div class="card-body">
        <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                        </div>
                        <div class="tab-title"> Product Description </div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Tags</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Reviews</
