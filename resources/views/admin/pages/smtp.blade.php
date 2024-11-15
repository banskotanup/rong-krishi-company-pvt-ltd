@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">SMTP Setting</h1>
                </div>
            </div>
        </div>
    </div>



    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website Name<span style="color: red;">*</span></label>
                                    <input type="text" placeholder="Website Name" class="form-control" name="name"
                                        required value="{{$getRecords->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mail Mailer<span style="color: red;">*</span></label>
                                    <input type="text" placeholder="Mail Mailer" class="form-control" name="mail_mailer"
                                        required value="{{$getRecords->mail_mailer}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mail Host<span style="color: red;">*</span></label>
                                    <input type="text" placeholder="Mail Host" class="form-control" name="mail_host"
                                        required value="{{$getRecords->mail_host}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mail Port<span style="color: red;">*</span></label>
                                    <input type="text" placeholder="Mail Port" class="form-control" name="mail_port"
                                        required value="{{$getRecords->mail_port}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mail Username<span style="color: red;">*</span></label>
                                    <input type="text" placeholder="Mail Username" class="form-control"
                                        name="mail_username" required value="{{$getRecords->mail_username}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mail Password<span style="color: red;">*</span></label>
                                    <input type="text" placeholder="Mail Password" class="form-control"
                                        name="mail_password" required value="{{$getRecords->mail_password}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mail Encryption<span style="color: red;">*</span></label>
                                    <input type="text" placeholder="Mail Encryption" class="form-control"
                                        name="mail_encryption" required value="{{$getRecords->mail_encryption}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mail From Address<span style="color: red;">*</span></label>
                                    <input type="text" placeholder="Mail From Address" class="form-control"
                                        name="mail_from_address" required value="{{$getRecords->mail_from_address}}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">SMTP Setting Warning</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <ul>
                                    <li>Use the correct credentials (email, username, password).</li>
                                    <li>Enable SSL/TLS with secure ports (465 or 587).</li>
                                    <li>Restrict access to trusted devices/networks.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <ul>
                                    <li>Configure SPF, DKIM, and DMARC for email security.</li>
                                    <li>Monitor for abuse and set rate limits.</li>
                                    <li>Regularly review SMTP logs to identify and address any suspicious activity or
                                        configuration issues.</li>
                                </ul>
                            </div>
                        </div>
                        <p style="color: red;">Note: Misconfigurations may lead to failures or security risks.</p>
                    </div>
                </div>
            </div>
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
                text: 'SMTP setting has been updated.'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});
</script>
@endsection