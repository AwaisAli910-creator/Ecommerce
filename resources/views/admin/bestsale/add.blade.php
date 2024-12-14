@extends('admin.admin_dashboard')
@section('admin')
 <!--start page wrapper -->
 <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
      <form method="POST" action="{{route('bestsale.store')}}" enctype="multipart/form-data">
         @csrf
         <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add Product</h5>
                <hr />
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="border border-3 p-4 rounded">
                                <h6>Product Information</h6>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" value="{{old('date')}}" class="form-control @error('date') is-invalid @enderror" id="date" name="date">
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                </div>
        
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category ID</label>
                                    <input type="number" value="{{old('category_id')}}" class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                </div>
        
                                <div class="mb-3">
                                    <label for="prod" class="form-label">Product</label>
                                    <input type="text" value="{{old('prod')}}" class="form-control @error('prod') is-invalid @enderror" id="prod" name="prod">
                                    <span class="text-danger">{{ $errors->first('prod') }}</span>
                                </div>
        
                                <div class="mb-3">
                                    <label for="title" class="form-label">Description</label>
                                    <input type="text" value="{{old('descp')}}" class="form-control @error('descp') is-invalid @enderror" id="descp" name="descp">
                                    <span class="text-danger">{{ $errors->first('descp') }}</span>
                                </div>
        
                                <div class="mb-3">
                                    <label for="prod_price" class="form-label">Product Price</label>
                                    <input type="number" value="{{old('prod_price')}}" class="form-control @error('prod_price') is-invalid @enderror" id="prod_price" name="prod_price">
                                    <span class="text-danger">{{ $errors->first('prod_price') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="b_img" class="form-label">Product Image</label>
                                    <input type="file" class="form-control @error('p_img') is-invalid @enderror" id="p_img" name="p_img">
                                    <span class="text-danger">{{ $errors->first('p_img') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="number" value="{{old('model')}}" class="form-control @error('model') is-invalid @enderror" id="model" name="model">
                                    <span class="text-danger">{{ $errors->first('model') }}</span>
                                </div>

                               {{-- <label>Select Color</label>
                               <div class="row">
                                @forelse ($colors as $color)
                                <div class="col-md-3">
                                    <div class="p-2 border mb-3">

                                    Color:<input type="checkbox" name="colors[]" value="{{$color->id}}">{{$color->name}}
                                    <br>
                                    Quantity: <input type="number" name="quantity[]" style="width:70px; border:1px solid">
                                </div>
                                  
                                </div>

                                @empty
                                <div class="col-md-12">
                                   <h1>No Colors Found</h1>
                                </div>
                                @endforelse
                               </div> --}}
                            </div>
                        </div>
        
                        <div class="col-lg-6">
                            <div class="border border-3 p-4 rounded">
                                <h6>Additional Information</h6>
        
                                {{-- <div class="mb-3">
                                    <label for="selling_price" class="form-label">Selling Price</label>
                                    <input type="number" value="{{old('selling_price')}}" class="form-control @error('selling_price') is-invalid @enderror" id="selling_price" name="selling_price">
                                    <span class="text-danger">{{ $errors->first('selling_price') }}</span>
                                </div> --}}
        
                                <div class="mb-3">
                                    <label for="discount_persent" class="form-label">Discount Percentage</label>
                                    <input type="number" value="{{old('discount_persent')}}" class="form-control @error('discount_persent') is-invalid @enderror" id="discount_persent" name="discount_persent">
                                    <span class="text-danger">{{ $errors->first('discount_persent') }}</span>
                                </div>
        
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" value="{{old('stock')}}" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock">
                                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                                </div>
        
                               
        
                                <div class="mb-3">
                                    <label for="delivery" class="form-label">Delivery</label>
                                    <input type="text" value="{{old('delivery')}}" class="form-control @error('delivery') is-invalid @enderror" id="delivery" name="delivery">
                                    <span class="text-danger">{{ $errors->first('delivery') }}</span>
                                </div>
        
                                <div class="mb-3">
                                    <label for="size" class="form-label">Size</label>
                                    <input type="number" value="{{old('size')}}" class="form-control @error('size') is-invalid @enderror" id="size" name="size">
                                    <span class="text-danger">{{ $errors->first('size') }}</span>
                                </div>
        
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug">
                                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                                </div>
        
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
          </div>
        </form>
      </div>


    </div>


    
<!--end page wrapper -->

@endsection