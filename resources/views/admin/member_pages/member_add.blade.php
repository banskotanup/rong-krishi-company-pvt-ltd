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
                        <label>First Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('name')}}" name="name" required
                            placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label>Last Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" required
                            placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label>Email<span style="color: red;">*</span></label>
                        <input type="email" class="form-control" value="{{old('email')}}" name="email" required
                            placeholder="Enter email">
                        <div style="color: red;">{{$errors->first('email')}}</div>
                    </div>
                    <div class="form-group">
                        <label>Phone<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('phone')}}" name="phone" required placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label>Country<span style="color: red;">*</span></label>
                        <input type="country" class="form-control" value="{{old('country')}}" name="country" required placeholder="Enter country name">
                    </div>
                    <div class="form-group">
                        <label>Address<span style="color: red;">*</span></label>
                        <input type="address" class="form-control" value="{{old('address')}}" name="address" required placeholder="Enter address">
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
                title: 'Member Created Successfully!',
                text: 'Please check your email for the verification message to complete the process.If you don’t receive the email, check your spam or junk folder. '
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});
</script>
@endsection