@extends('admin.admin_dashboard')
@section('admin')
  <!--start page wrapper -->
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Colors</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Colors</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
      <form method="POST" action="{{route('color.update',['id'=>$color->id])}}" >
      
        
        @method('PUT')
         @csrf
        <div class="card">
          <div class="card-body p-4">
              <h5 class="card-title">Add Color</h5>
              <hr/>
               <div class="form-body mt-4">
                <div class="row">
                   <div class="col-lg-8">
                   <div class="border border-3 p-4 rounded">
                       <div class="mb-3">
                         <label for="date" class="form-label">Color</label>
                         <input type="text" value="{{old('name',$color->name)}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                         <span class="text-danger">{{ $errors->first('name') }}</span>
                       </div>

                       <div class="mb-3">
                        <label for="date" class="form-label">Color code</label>
                        <input type="number" value="{{old('code',$color->code)}}" class="form-control @error('code') is-invalid @enderror" id="code" name="code">
                        <span class="text-danger">{{ $errors->first('code') }}</span>
                      </div>
                    
                      
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
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