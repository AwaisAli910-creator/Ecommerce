@extends('admin.admin_dashboard')
@section('admin')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
      <form method="POST" action="{{route('category.update',['id'=>$category->id])}}" >

        {{-- <form method="post" action="{{ route('finishgoodsproducts.update', ['id' => $product->id]) }}"> --}}
          @method('PUT')
  
         @csrf
        <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">Edit Category</h5>
              <hr/>
               <div class="form-body mt-4">
                <div class="row">
                   <div class="col-lg-8">
                   <div class="border border-3 p-4 rounded">
                       <div class="mb-3">
                         <label for="date" class="form-label">Date</label>
                         <input type="date" value="{{old('Date', $category->date)}}" class="form-control @error('date') is-invalid @enderror" id="Date" name="date">
                         <span class="text-danger">{{ $errors->first('Date') }}</span>
                       </div>

                       <div class="mb-3">
                         <label for="title" class="form-label">Title</label>
                         <input type="text" value="{{old('title', $category->title)}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                         <span class="text-danger">{{ $errors->first('title') }}</span>
                       </div>

                       <div class="mb-3">
                        <label for="slug" class="form-label">B Image</label>
                        <input type="file" value="" class="form-control @error('b_img') is-invalid @enderror" id="b_img" name="b_img">
                        <span class="text-danger">{{ $errors->first('b_img') }}</span>
                        
                        <img src="/uploads/category_img/{{$category->b_img }}" alt="">
                      </div>

                       <div class="mb-3">
                         <label for="dscp" class="form-label">Description</label>
                        <textarea name="descp" id="descp" value="{{old('descp')}}" class="form-control @error('descp') is-invalid @enderror" cols="5" rows="5">{{$category->descp}}</textarea>
                         <span class="text-danger">{{ $errors->first('descp') }}</span>
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