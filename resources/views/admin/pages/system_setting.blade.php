@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">System Settings</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-primary">
            @include('admin.auth.message')
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="website_name"
                                        value="{{$getRecords->website_name}}">
                                </div>
                            </div>
                            @if(empty($getRecords->getLogo()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo" value="{{$getRecords->logo}}">
                                </div>
                            </div>
                            @else
                            <div class="col-md-1">
                                <div class="form-group">
                                    
                                    <img src="{{$getRecords->getLogo()}}" style="width: 100px; height: 100px; border-radius: 80%;">

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo" value="{{$getRecords->logo}}">
                                </div>
                            </div>
                            @endif
                            @if(empty($getRecords->getFevicon()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fevicon</label>
                                    <input type="file" class="form-control" name="fevicon" value="{{$getRecords->fevicon}}">
                                </div>
                            </div>
                            @else
                            <div class="col-md-1">
                                <div class="form-group">
                                    
                                    <img src="{{$getRecords->getFevicon()}}" style="width: 100px; height: 100px; border-radius: 80%;">

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Fevicon</label>
                                    <input type="file" class="form-control" name="fevicon" value="{{$getRecords->fevicon}}">
                                </div>
                            </div>
                            @endif
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Office Address <span style="color: gray; font-style: italic;">(Only 255
                                            Characters)</span></label>
                                    <input type="text" class="form-control" name="office_address"
                                        value="{{$getRecords->office_address}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Office Email 1</label>
                                    <input type="text" class="form-control" name="email_one"
                                        value="{{$getRecords->email_one}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Office Email 2</label>
                                    <input type="text" class="form-control" name="email_two"
                                        value="{{$getRecords->email_two}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Office Phone 1</label>
                                    <input type="text" class="form-control" name="phone_one"
                                        value="{{$getRecords->phone_one}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Office Phone 2</label>
                                    <input type="text" class="form-control" name="phone_two"
                                        value="{{$getRecords->phone_two}}">
                                </div>
                            </div>
                            <hr />
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Footer Description <span style="color: gray; font-style: italic;">(Only 255
                                            Characters)</span></label>
                                    <input type="text" class="form-control" name="footer_description"
                                        value="{{$getRecords->footer_description}}">

                                </div>
                            </div>

                            @if(empty($getRecords->getFooterPaymentIcon()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Footer Payment Icon</label>
                                    <input type="file" class="form-control" name="footer_payment_icon" value="{{$getRecords->footer_payment_icon}}">
                                </div>
                            </div>
                            @else
                            <div class="col-md-1">
                                <div class="form-group">
                                    <img src="{{$getRecords->getFooterPaymentIcon()}}" style="width: 100px; height: 100px; border-radius: 80%;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Footer Payment Icon</label>
                                    <input type="file" class="form-control" name="footer_payment_icon" value="{{$getRecords->footer_payment_icon}}">
                                </div>
                            </div>
                            @endif

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook Link</label>
                                    <input type="text" class="form-control" name="facebook_link"
                                        value="{{$getRecords->facebook_link}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Twitter Link</label>
                                    <input type="text" class="form-control" name="twitter_link"
                                        value="{{$getRecords->twitter_link}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instagram Link</label>
                                    <input type="text" class="form-control" name="instagram_link"
                                        value="{{$getRecords->instagram_link}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Youtube Link</label>
                                    <input type="text" class="form-control" name="youtube_link"
                                        value="{{$getRecords->youtube_link}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pinterest Link</label>
                                    <input type="text" class="form-control" name="pinterest_link"
                                        value="{{$getRecords->pinterest_link}}">
                                </div>
                            </div>

                            @if(empty($getRecords->getStoreImage()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Store Image</label>
                                    <input type="file" class="form-control" name="store_image" value="{{$getRecords->store_image}}">
                                </div>
                            </div>
                            @else
                            <div class="col-md-1">
                                <div class="form-group">
                                    <img src="{{$getRecords->getStoreImage()}}" style="width: 100px; height: 100px; border-radius: 80%;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Store Image</label>
                                    <input type="file" class="form-control" name="store_image" value="{{$getRecords->store_image}}">
                                </div>
                            </div>
                            @endif
                            
                        </div>
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