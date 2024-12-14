@extends('admin.admin_dashboard')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ecommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Size List</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('success') }}
            <!-- No close button needed for auto-hide -->
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                  {{-- <form method="GET"  action="{{ route('finishgods.search') }}"> --}}
                        <div class="d-lg-flex">
                            <div class="col-8">
                                <input type="search" name="search" class="form-control" placeholder="Search By  Name" >
                            </div>
                            <div class="ms-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="ms-2">
                                <a href="/production/finishgods">
                                    <button type="button" class="btn btn-danger">Reset</button>
                                </a>
                            </div>
                        </div>
                    </form>
                {{-- </div> --}}
                     <div class="ms-auto"><a href="{{route('size.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Size</a></div>
                </div>
                
                @if($sizes->count()>0)
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Size</th>
                                
                                
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sizes as $size)
                            <tr>
                                <td style="vertical-align: middle">{{$size->size}}</td>

                            
                            
                                <td style="vertical-align: middle">
                                    <div class="d-flex order-actions">
                                        <a href="{{route('size.edit', $size->id)}}" class=""><i class='bx bxs-edit'></i></a>
                                        <form method="post" action="{{route('size.destroy', $size->id)}}">
												@csrf
												{{method_field('DELETE')}}
													<button type="submit" class="ms-2" style="padding: 9px 10px;outline:none;border:none;border-radius:5px;">
												<i class='bx bxs-trash'></i>
											</button>
											</form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {!! $sizes->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        @else
            <div class="alert alert-danger">No record found</div>
            @endif
            </div>
        </div>


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