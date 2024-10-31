@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add New Discount Code</h1>
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
                        <label>Discount Code Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('name')}}" name="name" required
                            placeholder="Enter discount code name">
                    </div>

                    <div class="form-group">
                        <label>Type <span style="color: red;">*</span></label>
                        <select class="form-control" name="type" required>
                            <option {{(old('type') == 'Amount') ? 'selected' : ''}} value="Amount">Amount</option>
                            <option {{(old('type') == 'Percent') ? 'selected' : ''}} value="Percent">Percent</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Amount / Percent <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('percent_amount')}}" name="percent_amount" required
                            placeholder="Amount / Percent">
                    </div>

                    <div class="form-group">
                        <label>Expire Date <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{old('expire_date')}}" name="expire_date" required>
                    </div>

                    <div class="form-group">
                        <label>Status <span style="color: red;">*</span></label>
                        <select class="form-control" name="status">
                            <option {{(old('status') == 0) ? 'selected' : ''}} value="0">Active</option>
                            <option {{(old('status') == 1) ? 'selected' : ''}} value="1">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection