@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Shipping Charge</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-primary">
            <form action="" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Shipping Charge Name</label>
                        <input type="text" class="form-control" value="{{old('name', $getRecords->name)}}" name="name"
                            required placeholder="Enter shipping charge name">
                    </div>

                    <div class="form-group">
                        <label>Price <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('percent_amount', $getRecords->price)}}" name="price" required
                            placeholder="Price">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option {{(old('status', $getRecords->status) == 0) ? 'selected' : ''}} value="0">Active</option>
                            <option {{(old('status', $getRecords->status) == 1) ? 'selected' : ''}} value="1">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection