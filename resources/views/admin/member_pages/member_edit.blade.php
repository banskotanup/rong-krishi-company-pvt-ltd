@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Member (User ID: <span style="color: #D0342C;">{{$getRecords->user_number}}</span>)</h1>
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
                        <input type="text" class="form-control" value="{{old('name', $getRecords->name)}}" name="name"
                            required placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Last Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('last_name', $getRecords->last_name)}}" name="last_name"
                            required placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label>Email<span style="color: red;">*</span></label>
                        <input type="email" class="form-control" value="{{old('email', $getRecords->email)}}"
                            name="email" required placeholder="Enter email">
                        <div style="color: red;">{{$errors->first('email')}}</div>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="{{old('phone', $getRecords->phone)}}" name="phone" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label>Country<span style="color: red;"></span></label>
                        <input type="country" class="form-control" value="{{old('country', $getRecords->country)}}" name="country" required placeholder="Enter country name">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="address" class="form-control" value="{{old('address', $getRecords->address)}}" name="address" placeholder="Enter address">
                    </div>
                    <div class="form-group">
                        <label>Password<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="password" placeholder="Enter password">
                        <p>Do you want to change password? If so, please add!!!</p>
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
<script>
    $(document).ready(function () {
    var shownPopup = false;
    $("form").submit(function (event) {
        if (shownPopup === false) {
            event.preventDefault();
            shownPopup = true;
            var form = $(this);
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: 'Member has been updated!'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});
</script>
@endsection