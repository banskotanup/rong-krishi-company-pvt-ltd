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
                            @php
                                $getImage = $getRecords->getImageSingle($getRecords->id);
                            @endphp
                                @if(empty($getImage) && empty($getImage->getImage()))
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile Picture <span style="color: red;">*</span></label>
                                        <input type="file" class="form-control" name="profile_picture" value="{{$getRecords->profile_picture}}" required>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <img src="{{$getImage->getImage()}}" style="width: 100px; height: 100px; border-radius: 80%;">

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Profile Picture </label>
                                        <input type="file" class="form-control" name="profile_picture" value="{{$getRecords->profile_picture}}">
                                    </div>
                                </div>
                                @endif


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email<span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" value="{{old('email', $getRecords->email)}}" name="email"
                                        required placeholder="Enter email">
                                    <div style="color: red;">{{$errors->first('email')}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="{{old('first_name', $getRecords->first_name)}}" name="first_name" 
                                        placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="{{old('last_name', $getRecords->last_name)}}" name="last_name" 
                                        placeholder="Enter last name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Whatsapp Number</label>
                                    <input type="text" class="form-control" value="{{old('whatsapp_number', $getRecords->whatsapp_number)}}" name="whatsapp_number"
                                     placeholder="Enter whatsapp number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook Profile URL</label>
                                    <input type="text" class="form-control" value="{{old('facebook_link', $getRecords->facebook_link)}}" name="facebook_link"
                                        placeholder="Enter facebook profile url">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="country" class="form-control" value="{{old('country', $getRecords->country)}}" name="country"
                                        placeholder="Enter country name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="address" class="form-control" value="{{old('address', $getRecords->address)}}" name="address"
                                        placeholder="Enter address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postcode</label>
                                    <input type="text" class="form-control" name="postcode" value="{{old('address', $getRecords->address)}}"
                                        placeholder="Enter postcode">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option {{(old('status', $getRecords->status) == 0) ? 'selected' : ''}} value="0">Active</option>
                                    <option {{(old('status', $getRecords->status) == 1) ? 'selected' : ''}} value="1">Inactive</option>
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
                title: 'Updated!',
                text: 'Team has been updated.'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});
</script>
@endsection