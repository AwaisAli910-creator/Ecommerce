@extends('admin.admin_dashboard')
@section('admin')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
      
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto">
                        <!-- Button trigger modal -->

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Order#</th>
                                <th>Customer Name</th> <!-- Updated from Company Name to Customer Name -->
                                <th>Status</th>
                                <th>Total</th>
                                <th>View Details</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#{{ $order->order_number }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->cus_fname . $order->cus_lname }}</td> <!-- Updated from company_name to customer_name -->
                                <td>
                                    @if($order->status == 'pending')
                                    <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle me-1'></i>Pending
                                    </div>
                                    @elseif($order->status == 'Confirmed')
                                    <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle align-middle me-1'></i>Confirmed
                                    </div>
                                    @elseif($order->status == 'Partially shipped')
                                    <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle align-middle me-1'></i>Partially shipped
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $order->total_amount }}</td>
                                <td><a href="{{ route('orders.show',$order->id)}}">View Order</a></td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addOrderModalLabel">Add New Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="order_number" class="form-label">Order Number</label>
                <input type="text" class="form-control" id="order_number" name="order_number" required>
            </div>
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label> <!-- Updated from company_name to customer_name -->
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="Fulfilled">Fulfilled</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Partially shipped">Partially shipped</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="order_date" class="form-label">Order Date</label>
                <input type="date" class="form-control" id="order_date" name="order_date" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Order</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--end page wrapper -->  
@endsection
