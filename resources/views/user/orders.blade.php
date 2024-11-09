@extends('home.layouts.app')
@section('style')
<style>
    #th{
        padding: 10px;
        font-weight: 500;
        border: 1px solid rgb(245, 202, 202);
        
    }
    td{
        border: 1px solid rgb(245, 202, 202);
    }

    #cen{
        text-align: center;
    }

    #img_{
            width: 80px;
            height: 100px;
        }

    #name{
        text-align: justify;
    }

</style>
    
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Orders</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">My Account</li>
                <li class="breadcrumb-item active" aria-current="page">My Orders</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    @include('user._sidebar')
                    @include('sweetalert::alert')
                    <div class="col-md-12 col-lg-9">
                        <div class="tab-content">
                            @foreach ($getRecords->take(1) as $value)
                            <h4 class="card-title" style="margin-bottom: 10px;">Hello, {{$value->first_name}}</h4>
                            Here you’ll find a detailed summary of all your orders, including the items, quantities, and total amounts. You can track your order status and view your purchase history anytime.
                            @endforeach
                            @if(!empty($getRecordCount))   
                            <h3 class="card-title" style="margin-bottom: 10px; margin-top: 5px;">Your Order Summary</h3>
                            <div class="card-body p-0 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th id="th">#</th>
                                    <th id="th">Order Number</th>
                                    <th id="th">Total Amount(NPR)</th>
                                    <th id="th">Payment Method</th>
                                    <th id="th">Created Date</th>
                                    <th id="th">Status</th>
                                    <th id="th" style="text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach ($getRecords as $value)
                                  <tr>
                                      <td id="cen">{{$no++}}</td>
                                      <td id="cen">{{$value->order_number}}</td>
                                      <td id="cen">{{number_format($value->total_amount, 2)}}</td>
                                      <td id="cen" style="text-transform: capitalize;">{{$value->payment_method}}</td>
                                      <td id="cen">{{date('d-m-y', strtotime($value->created_at))}}</td>
                                      <td id="cen">
                                        @if ($value->status == 0)
                                        <span class="badge badge-primary float-left" style="margin-left: 10px;">Pending</span>
                                        <br>
                                        <select class="form-control ChangeStatus" id="{{$value->id}}" style="width: 18px; height: 10px; background-color: rgba(255,255,255,0); margin-left: 5px; border-style:none; ">
                                            <option {{($value->status == 0) ? 'Selected' : ''}} value="0">Pending</option>
                                            <option {{($value->status == 4) ? 'Selected' : ''}} value="4">Cancel</option>
                                        </select>
                                        @endif
                                        @if ($value->status == 1)
                                        <span class="badge badge-warning float-left" style="margin-left: 5px;">Inprogress</span>
                                        @endif
                                        @if ($value->status == 2)
                                        <span class="badge badge-info float-left" style="margin-left: 7px;">Delievred</span>
                                        @endif
                                        @if ($value->status == 3)
                                        <span class="badge badge-success float-left" style="margin-left: 5px;">Completed</span>
                                        @endif
                                        @if ($value->status == 4)
                                        <span class="badge badge-danger float-left" style="margin-left: 5px;">Cancelled</span>
                                        @endif
                                      </td>
                                      <td id="cen" style="text-align: center;">
                                        <a href="{{url('/user_order_view/'.$value->id)}}" class="btn btn-primary">Details</a>
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
                            @else
                            <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                @include('admin.auth.message')
                                <div class="error-content text-center" style="background-image: url(assets/images/backgrounds/error-bg.jpg)">
                                    <div class="container">
                                        <h1 class="error-title">Oops, No Record Found!!!</h1><!-- End .error-title -->
                                        <p>You've not placed any order yet.</p>
                                        <a href="{{url('/')}}#products" class="btn btn-outline-primary-2 btn-minwidth-lg">
                                            <span>Shop Now</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .container -->
                                </div><!-- End .error-content text-center -->
                            </div>
                              @endif
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection

@section('script')
    <script type="text/javascript">
    $('body').delegate('.ChangeStatus', 'change', function(){
        var status = $(this).val();
        var order_id = $(this).attr('id');
        $.ajax({
            type : "GET",
            url : "{{ url('/user_order_status') }}",
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
