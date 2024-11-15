@extends('home.layouts.app')
@section('style')
<style>
    #th{
        padding: 10px;
        margin: 10px;
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
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Order Details</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">My Account</li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    @include('user._sidebar')

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                        @include('admin.auth.message')
                            <h3 class="card-title" style="margin-bottom: 10px; margin-left: 20px;">Order Details</h3>

                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ID: <span style="font-weight: 500;">{{$getRecords->id}}</span> </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Order Number: <span style="color: red;">{{$getRecords->order_number}}</span> </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name: <span style="font-weight: 500; color: #605e5e;">{{$getRecords->first_name}}
                                                            {{$getRecords->last_name}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Company Name: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->company_name}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->country}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->address_one}},
                                                            {{$getRecords->address_two}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->city}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->state}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Postcode: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->postcode}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->phone}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->email}}</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Discount Code: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->discount_code}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Discount Amount: <span style="font-weight: 500; color: #605e5e;">NPR
                                                            {{number_format($getRecords->discount_amount, 2)}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Shipping Name: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->getShipping->name}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Shipping Amount: <span style="font-weight: 500; color: #605e5e;">NPR
                                                            {{number_format($getRecords->shipping_amount, 2)}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Payable Amount: NPR <span style="font-weight: 500; text-decoration-line: underline; text-decoration-style: double;">{{number_format($getRecords->total_amount,
                                                            2)}}</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Created Date: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->created_at}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="overflow:auto;">
                                                <div class="form-group">
                                                    <label>Transaction ID: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->transaction_id}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Payment Method: <span
                                                            style="text-transform: capitalize; color:#c08f07; font-weight:500;">{{$getRecords->payment_method}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status:
                                                        @if ($getRecords->status == 0)
                                                        <span style="color: gray; font-weight:500;">Pending</span>
                                                        @endif
                                                        @if ($getRecords->status == 1)
                                                        <span style="color: blue; font-weight:500;">Inprogress</span>
                                                        @endif
                                                        @if ($getRecords->status == 2)
                                                        <span style="color: teal; font-weight:500;">Delievred</span>
                                                        @endif
                                                        @if ($getRecords->status == 3)
                                                        <span style="color: rgb(8, 165, 8); font-weight:500;">Completed</span>
                                                        @endif
                                                        @if ($getRecords->status == 4)
                                                        <span style="color: #D0342C; font-weight:500;">Cancelled</span>
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="card" >
                                    <div class="card-header" style="margin-top: 20px;">
                                        <h3 class="card-title">Product Details</h3>
                                    </div>
                                    <div class="card-body p-0 table-responsive">
                                        <table class="table table-striped" style="margin-top: 10px;">
                                            <thead>
                                                <tr>
                                                    <th id="th">#</th>
                                                    <th id="th">Image</th>
                                                    <th id="th">Product Name</th>
                                                    <th id="th">Quantity</th>
                                                    <th id="th">Price</th>
                                                    <th id="th">Total Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($getRecords->getItem as $item)
                                                @php
                                                $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id);
                                                @endphp
                                                <tr >
                                                    <td id="cen">{{$no++}}</td>
                                                    <td id="img_">
                                                        <img  src="{{$getProductImage->getImage()}}" alt="">
                                                    </td>
                                                    <td id="name">{{$item->getProduct->title}}
                                                    @if($getRecords->status == 3)
                                                    @php
                                                        $getReview = $item->getReview($item->getProduct->id, $getRecords->id);
                                                    @endphp <br> <br>
                                                    
                                                    @if(!empty($getReview))
                                                        <b> Rating : </b> {{ $getReview->rating }} <br>
                                                        <b> review : </b> {{ $getReview->review }} <br> 
                                                    @else
                                                    <br> <button class="btn btn-primary MakeReview" id="{{ $item->getProduct->id }}" data-order={{ $getRecords->id }}>
                                                    Make Review</button>
                                                    @endif
                                                     
                                                    @endif
                                                    </td>
                                                    <td id="cen">{{$item->qty}}</td>
                                                    <td id="cen">{{number_format($item->price, 2)}}</td>
                                                    <td id="cen">{{number_format($item->price * $item->qty, 2)}}</td>
                                                </tr>
                        
                                                @endforeach
                        
                                            </tbody>
                                        </table>
                                        {{-- <div style="padding: 10px; float: right;">
                                            {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:1px;">
                                <div class="card card-primary" >
                                    <div class="card-body" >
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <div class="form-group" style="text-align: end;">
                                                    <label style="font-weight: 500; margin-top: 10px;">Total Balance: NPR 
                                                        <span style="text-decoration-line: underline; text-decoration-style: double;">
                                                            {{number_format($getRecords->total_balance,
                                                                2)}}
                                                        </span>
                                                    </label>
                                                </div>
                                                <p style="text-align: center; color:gray;">"This is the total balance for products only. The final price may vary after applying discounts and shipping charges."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

<div class="modal fade" id="MakeReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('user/make-review') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" required id="getProductId" name="product_id">
        <input type="hidden" required id="getOrderId" name="order_id">
      <div class="modal-body" style="padding: 20px;">
        <div class="form-group" style="margin-bottom: 15px;">
            <label>How many rating? *</label>
            <select class="form-control" required name="rating">
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="form-group">
            <label>Review *</label>
                <textarea class="form-control" required name="review"></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>

    </div>
  </div>
</div>

@endsection
@section('script')
    <script type="text/javascript">
        $('body').delegate('.MakeReview', 'click', function(){
            var product_id = $(this).attr('id');
            var order_id = $(this).attr('data-order');
            $('#getProductId').val(product_id);
            $('#getOrderId').val(order_id);
            $('#MakeReviewModal').modal('show');
            
        });
    </script>
@endsection
