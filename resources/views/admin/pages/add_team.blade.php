@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add New Team Member</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-primary">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Profile Picture <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="profile_picture" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email<span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" value="{{old('email')}}" name="email"
                                        required placeholder="Enter email">
                                    <div style="color: red;">{{$errors->first('email')}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" required
                                        placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" required
                                        placeholder="Enter last name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Whatsapp Number<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('whatsapp_number')}}" name="whatsapp_number"
                                        required placeholder="Enter whatsapp number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook Profile URL<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('facebook_link')}}" name="facebook_link"
                                        required placeholder="Enter facebook profile url">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country<span style="color: red;">*</span></label>
                                    <input type="country" class="form-control" value="{{old('country')}}" name="country"
                                        required placeholder="Enter country name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address<span style="color: red;">*</span></label>
                                    <input type="address" class="form-control" value="{{old('address')}}" name="address"
                                        required placeholder="Enter address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postcode<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="postcode" required
                                        placeholder="Enter postcode">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{(old('status')==0) ? 'selected' : '' }} value="0">Active</option>
                                        <option {{(old('status')==1) ? 'selected' : '' }} value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
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
                title: 'Success!',
                text: 'Team member added.'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});
</script>
@endsection