@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add New Member</h1>
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
                        <label>Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('name')}}" name="name" required
                            placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Email<span style="color: red;">*</span></label>
                        <input type="email" class="form-control" value="{{old('email')}}" name="email" required
                            placeholder="Enter email">
                        <div style="color: red;">{{$errors->first('email')}}</div>
                    </div>
                    <div class="form-group">
                        <label>Password<span style="color: red;">*</span></label>
                        <input type="password" class="form-control" name="password" required
                            placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
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