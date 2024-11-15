@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Payment Setting</h1>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="">Cash on Delivery</label>
                                    <input type="checkbox" {{!empty($getRecords->is_cod) ? 'checked' : ''}} name="is_cod">
                                </div>
                                <p style="color: gray;">Enable COD, define service areas, set order limits, add fees, and verify customer details for secure transactions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="">Esewa</label>
                                    <input type="checkbox" {{!empty($getRecords->is_esewa) ? 'checked' : ''}} name="is_esewa">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Esewa Id</label>
                                    <input type="text" placeholder="Esewa Id" class="form-control" name="esewa_id"
                                        value="{{$getRecords->esewa_id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Esewa Status</label>
                                    <select class="form-control" name="esewa_status">
                                        <option {{($getRecords->esewa_status == 'sandbox') ? 'selected' : ''}} value="sandbox">Sandbox</option>
                                        <option {{($getRecords->esewa_status == 'live') ? 'selected' : ''}} value="live">Live</option>
                                    </select>
                                </div>
                            </div>
                            <p style="color: gray;">Enable eSewa, verify merchant details, set transaction limits, and ensure seamless integration for secure payments.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="">Stripe</label>
                                    <input type="checkbox" {{!empty($getRecords->is_stripe) ? 'checked' : ''}} name="is_stripe">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Stripe Public Key</label>
                                    <input type="text" placeholder="Stripe Public Key" class="form-control" name="stripe_public_key"
                                        value="{{$getRecords->stripe_public_key}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Stripe Secret Key</label>
                                    <input type="text" placeholder="Stripe Secret Key" class="form-control" name="stripe_secret_key"
                                         value="{{$getRecords->stripe_secret_key}}">
                                </div>
                            </div>
                            <p style="color: gray;">Enable Stripe, verify your account, set currency preferences, and integrate securely for smooth online transactions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Payment Setting Warning</h1>
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
                                    <li>Secure API Keys: Keep API keys confidential to prevent unauthorized access.</li>
                                    <li>SSL Encryption: Ensure SSL is enabled for secure transactions.</li>
                                    <li>Currency Accuracy: Configure the correct currency to avoid mismatches.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <ul>
                                    <li>Transaction Limits: Set limits to prevent fraudulent or excessive transactions.</li>
                                    <li>Payment Gateways: Verify the integration and credentials of all gateways.</li>
                                    <li>Fraud Prevention: Enable fraud detection tools and monitor for suspicious activity.</li>
                                </ul>
                            </div>
                        </div>
                        <p style="color: red;">Note: Ensure secure API keys, enable SSL, set correct currency, configure transaction limits, verify gateways, and enable fraud detection tools.</p>
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
                text: 'Payment setting has been updated.'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});
</script>
@endsection