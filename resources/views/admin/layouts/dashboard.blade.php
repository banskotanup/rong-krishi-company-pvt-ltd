@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$total_orders}}</h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('/order_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$total_customer}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('/member_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$total_product}}</h3>

                <p>Total Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{url('/product_list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6" style="overflow: hidden;">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 style="font-size: 35px;">{{number_format($total_amount, 2)}}</h3>

                <p>NPR</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="	fas fa-wallet"></i> Total balance </a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's total Orders</span>
                <span class="info-box-number">{{$today_orders}}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's total Customers</span>
                <span class="info-box-number">{{$today_customer}}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fab fa-product-hunt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's New Product</span>
                <span class="info-box-number">{{$today_product}}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3" >
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's total Amount</span>
                <span class="info-box-number">NPR {{number_format($today_amount, 2)}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-12">
        <div class="row">

          <div class="col-md-4">
            <div class="card" style="height: 480px;">
              <div class="card-header">
                <h3 class="card-title">Rong Krishi Admins</h3>
      
                <div class="card-tools">
                  <span class="badge badge-danger">{{$total_admin}} Total Admin</span>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($get_admin as $values)
                  <li class="item">
                    <div class="product-img">
                      <img src="/user_logo.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{$values->name}}
                      <span class="product-description">
                        {{$values->email}}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{url('/admin_list')}}" class="uppercase">View All Admins</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="height: 480px;">
              <div class="card-header">
                <h3 class="card-title">Recently Added Member</h3>
      
                <div class="card-tools">
                  <span class="badge badge-danger">{{$total_customer}} Total Members</span>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($get_customer as $values)
                  <li class="item">
                    <div class="product-img">
                      <img src="/user_logo.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{$values->name}}
                      <span class="product-description">
                        {{$values->email}}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{url('/member_list')}}" class="uppercase">View All Members</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="height: 480px;">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>
      
                <div class="card-tools">
                  <span class="badge badge-danger">{{$total_product}} Total Products</span>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" >
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach ($recent_product as $item)
                  @php
                        $getProductImage = $item->getImageSingle($item->id);
                    @endphp
                  <li class="item">
                    <div class="product-img">
                                <img style="width: 100px; height:100px;" src="{{$getProductImage->getImage()}}" alt="">      
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title" style=" margin-left:30px;"> {{$item->title}}
                        <span class="badge badge-warning float-right" style="overflow: hidden">NPR {{$item->price}}</span></a>
                        <span class="product-description" style=" margin-left:72px;">
                        {{$item->short_description}}
                        </span>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{url('/product_list')}}" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>

        </div>
      </div>

      

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
  
              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Latest Orders</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Order Number</th>
                        <th>Country</th>
                        <th>Postcode</th>
                        <th>Phone</th>
                        <th>Email</th>
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
                      @foreach ($latest_order as $value)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$value->first_name}} {{$value->last_name}}</td>
                          <td>{{$value->order_number}}</td>
                          <td>{{$value->country}}</td>
                          <td>{{$value->postcode}}</td>
                          <td>{{$value->phone}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{number_format($value->discount_amount, 2)}}</td>
                          <td>{{number_format($value->shipping_amount, 2)}}</td>
                          <td>{{number_format($value->total_amount, 2)}}</td>
                          <td style="text-transform: capitalize;">{{$value->payment_method}}</td>
                          <td>{{date('d-m-y', strtotime($value->created_at))}}</td>
                          <td>
                            @if ($value->status == 0)
                            <span class="badge badge-primary float-left" style="margin-left: 7px;">Pending</span>
                            @endif
                            @if ($value->status == 1)
                            <span class="badge badge-warning float-left">Inprogress</span>
                            @endif
                            @if ($value->status == 2)
                            <span class="badge badge-info float-left" style="margin-left: 3px;">Delievred</span>
                            @endif
                            @if ($value->status == 3)
                            <span class="badge badge-success float-left">Completed</span>
                            @endif
                            @if ($value->status == 4)
                            <span class="badge badge-danger float-left" style="margin-left: 3px;">Cancelled</span>
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
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
    </section>
  </div>
  

@endsection

@section('script')
<script src="/admin/dist/js/pages/dashboard3.js"></script>

@endsection