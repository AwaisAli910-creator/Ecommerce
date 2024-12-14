@extends('admin.admin_dashboard')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="{{route('products.create')}}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Product</a>
                            </div>
                            <div class="col-lg-9 col-xl-10">
                                <form class="float-lg-end">
                                    <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                        <div class="col">
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-white">Sort By</button>
                                                <div class="btn-group" role="group">
                                                  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-chevron-down'></i>
                                                  </button>
                                                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                  </ul>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-white">Collection Type</button>
                                                <div class="btn-group" role="group">
                                                  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bxs-category'></i>
                                                  </button>
                                                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                  </ul>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-white">Price Range</button>
                                                <div class="btn-group" role="group">
                                                  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-slider'></i>
                                                  </button>
                                                  <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                  </ul>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- Products  --}}

<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
    @foreach($products as $product)
        <div class="col">
            <div class="card">
                {{-- <img src="{{ $product->p_img }}" class="card-img-top" alt="{{ $product->p_img }}"> --}}
                <img src="/uploads/products_img/{{ $product->p_img }}" class="card-img-top" alt="...">

                <div class="position-absolute top-0 end-0 m-3 product-discount">
                    <span class="">-{{ $product->discount_persent }}%</span>
                </div>
                <div class="card-body">
                    <h6 class="card-title cursor-pointer">{{ $product->prod_price }}</h6>
                    <div class="clearfix">
                        <p class="mb-0 float-start"><strong>{{ $product->sales }}</strong> Sales</p>
                        <p class="mb-0 float-end fw-bold">
                            <span class="me-2 text-decoration-line-through text-secondary">${{ $product->prod_price }}</span>
                            <span>${{ $product->discount_persent }}</span>
                        </p>
                    </div>
                    <div class="d-flex align-items-center mt-3 fs-6">
                        <div class="cursor-pointer">
                            @for($i = 0; $i < 5; $i++)
                                <i class='bx bxs-star {{ $i < $product->rating ? 'text-warning' : 'text-secondary' }}'></i>
                            @endfor
                        </div>
                        <p class="mb-0 ms-auto">{{ $product->rating }} ({{ $product->reviews_count }})</p>
                    </div>
                    <div class="mt-2">
                        <p class="mb-0">Stock: <strong>{{ $product->stock }}</strong></p>
                        <p class="mb-0">Size: <strong>{{ $product->size }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

        
            <!--end row--> --


    </div>
</div>
<!--end page wrapper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function() {
                // Add the fade-out class to trigger fade-out effect
                alert.classList.remove('show');
                alert.classList.add('fade');
                // Wait for Bootstrap transition to complete before removing the element
                setTimeout(function() {
                    alert.remove();
                }, 150); // Match the transition duration in Bootstrap CSS
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
</script>
@endsection