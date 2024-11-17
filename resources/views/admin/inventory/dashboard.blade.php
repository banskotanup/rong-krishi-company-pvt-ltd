@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Our Inventory</h1>
        </div>
      </div>
    </div>
  </div>


  <form action="" method="GET">
    <div class="card">
        <div class="card-header">
           <h3 class="card-title">Inventory <span style="color: #D0342C;">(Record Found: {{$getRecords->total()}})</span></h3>
           <div class="col-sm-6" style="text-align:right; float:right;">
            <a href="{{ url('/inventory-export-pdf') }}" class="btn btn-secondary">Export to PDF</a>
            <a href="{{ url('/export-inventory') }}" class="btn btn-success">Export to Excel</a>
          </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" placeholder="Product Name" name="product_name" class="form-control" value="">
                    </div>
                </div>
    
                <div class="col-md-2" style="margin-top: 30px;">
                    <button  class="btn btn-primary btn_edit"
                        style="width: 50px;"><i class="fas fa-search"></i></button>
                    <a href="{{url('/inventory')}}" class="btn btn-danger btn_delete"
                        style="width: 50px;"><i class="fas fa-undo"></i></a>
                </div>
                
            </div>
        </div>
    </div>
</form>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Inventory List</h3>
    </div>

    <div class="card-body p-0 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Purchase Quantity</th>
            <th>Sold Quantity</th>
            <th>Remaining Quantity</th>
            <th>Status</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($getRecords as $value)
          <tr>
            <td>{{$no++}}</td>
            <td style="text-transform: capitalize;">{{$value->title}}</td>
            <td>{{$value->purchase_quantity}}</td>
            <td>{{$value->sold_quantity}}</td>
            <td>{{$value->remaining_quantity}}</td>
            <td>
              @if ($value->remaining_quantity > 0)
              <span style="color: rgb(9, 116, 9)">Available</span>
              @else
              <span style="color: #D0342C">Out of Stock</span>
              @endif
            </td>
            <td style="text-align: center;">
              <a href="{{url('/product/'.$value->id)}}" class="btn btn-primary">Details</a>
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


@endsection