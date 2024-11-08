@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order Lists</h1>
                </div>
            </div>
        </div>
    </div>

    @include('admin.auth.message')

    <form action="" method="GET">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order Search <span style="color: #D0342C;">(Record Found: {{$getRecords->total()}})</span></h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Order Number</label>
                            <input type="text" placeholder="Order Number" name="order_number" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" placeholder="First Name" name="first_name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" placeholder="Last Name" name="last_name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" placeholder="Email" name="email" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" placeholder="Phone" name="phone" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" placeholder="Country" name="country" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">State</label>
                            <input type="text" placeholder="State" name="state" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" placeholder="City" name="city" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Postcode</label>
                            <input type="text" placeholder="Postcode" name="postcode" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">From Date</label>
                            <input type="date" style="padding: 6px;" name="from_date" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">To Date</label>
                            <input type="date" style="padding: 6px;" name="to_date" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2" style="margin-top: 30px;">
                        <button  class="btn btn-primary btn_edit"
                            style="width: 50px;"><i class="fas fa-search"></i></button>
                        <a href="{{url('/order_list')}}" class="btn btn-danger btn_delete"
                            style="width: 50px;"><i class="fas fa-undo"></i></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order Lists</h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Order Number</th>
                        <th>Country</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Discount Code</th>
                        <th>Discount Amount(NPR)</th>
                        <th>Shipping Amount(NPR)</th>
                        <th>Total Amount(NPR)</th>
                        <th>Payment Method</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecords as $value)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$value->first_name}} {{$value->last_name}}</td>
                        <td>{{$value->order_number}}</td>
                        <td>{{$value->country}}</td>
                        <td>{{$value->address_one}} <br /> {{$value->address_two}}</td>
                        <td>{{$value->city}}</td>
                        <td>{{$value->state}}</td>
                        <td>{{$value->postcode}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->discount_code}}</td>
                        <td>{{number_format($value->discount_amount, 2)}}</td>
                        <td>{{number_format($value->shipping_amount, 2)}}</td>
                        <td>{{number_format($value->total_amount, 2)}}</td>
                        <td style="text-transform: capitalize;">{{$value->payment_method}}</td>
                        <td>{{date('d-m-y', strtotime($value->created_at))}}</td>
                        <td>
                            @if ($value->status == 4)
                                <span class="badge badge-danger float-left" style="margin-left: 20px; margin-top:20px;">Cancelled</span>
                            @elseif($value->status == 3)
                            <span class="badge badge-success float-left" style="margin-left: 18px; margin-top:20px;">Completed</span>
                            @else
                            <select class="form-control ChangeStatus" id="{{$value->id}}" style="width: 120px;">
                                <option {{($value->status == 0) ? 'Selected' : ''}} value="0">Pending</option>
                                <option {{($value->status == 1) ? 'Selected' : ''}} value="1">Inprogress</option>
                                <option {{($value->status == 2) ? 'Selected' : ''}} value="2">Delivered</option>
                                <option {{($value->status == 3) ? 'Selected' : ''}} value="3">Completed</option>
                                <option {{($value->status == 4) ? 'Selected' : ''}} value="4">Cancelled</option>
                            </select>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a href="{{url('/order_view/'.$value->id)}}" class="btn btn-primary">Details</a>
                            {{-- <a onclick="confirmation(event)" href="{{url('/category_delete/'.$value->id)}}"
                                class="btn btn-danger btn_delete" style="width: 50px;"><i class="fas fa-trash"></i></a>
                            --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding: 10px; float: right;">
                {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('body').delegate('.ChangeStatus', 'change', function(){
        var status = $(this).val();
        var order_id = $(this).attr('id');
        $.ajax({
            type : "GET",
            url : "{{ url('/order_status') }}",
            data : {
                status : status,
                order_id : order_id,
            },
            dataType : "json",
            success: function(data) {
                location.reload();
                
            },
            error: function (data) {
            }
        });
    });
</script>
@endsection