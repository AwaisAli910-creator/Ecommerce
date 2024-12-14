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
                                <a href="{{route('bestsale.create')}}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Product</a>
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
@if($bestsales->count()>0)
<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
    @foreach($bestsales as $bestsale)
    <div class="col">
        <div class="card">
            <img src="/uploads/bestsale_img/{{ $bestsale->p_img }}" class="card-img-top" alt="...">
    
            <div class="position-absolute top-0 end-0 m-3 product-discount">
                <span class="">-{{ $bestsale->discount_persent }}%</span>
            </div>
            <div class="card-body">
                <h6 class="card-title cursor-pointer">{{ $bestsale->prod_price }}</h6>
                <div class="clearfix">
                    <p class="mb-0 float-start"><strong>{{ $bestsale->sales }}</strong> Sales</p>
                    <p class="mb-0 float-end fw-bold">
                        <span class="me-2 text-decoration-line-through text-secondary">${{ $bestsale->prod_price }}</span>
                        <span>${{ $bestsale->discount_persent }}</span>
                    </p>
                </div>
                <div class="d-flex align-items-center mt-3 fs-6">
                    <div class="cursor-pointer">
                        @for($i = 0; $i < 5; $i++)
                            <i class='bx bxs-star {{ $i < $bestsale->rating ? 'text-warning' : 'text-secondary' }}'></i>
                        @endfor
                    </div>
                    <p class="mb-0 ms-auto">{{ $bestsale->rating }} ({{ $bestsale->reviews_count }})</p>
                </div>
                <div class="mt-2">
                    <p class="mb-0">Stock: <strong>{{ $bestsale->stock }}</strong></p>
                    <p class="mb-0">Size: <strong>{{ $bestsale->size }}</strong></p>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <a href="{{ route('bestsale.edit', $bestsale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bestsale.destroy', $bestsale->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @endforeach
</div>
@else
<div class="alert alert-danger">No record found</div>
@endif

        
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