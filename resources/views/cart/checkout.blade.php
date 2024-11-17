@extends('home.layouts.app')
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div style="text-align: center;">
        @include('admin.auth.message')
    </div>

    
    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div style="margin-bottom: 20px; color:#28a745 ;" id="message"></div>
                <form action="" id="SubmitForm" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title bill">Billing Details</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name <span style="color: red;">*</span></label>
                                    <input type="text" name="first_name" class="form-control" required value="{{!empty(Auth::user()->name) ? Auth::user()->name : ''}}">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Last Name <span style="color: red;">*</span></label>
                                    <input type="text" name="last_name" class="form-control" required value="{{!empty(Auth::user()->last_name) ? Auth::user()->last_name : ''}}">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Company Name (Optional)</label>
                            <input type="text" name="company_name" class="form-control" value="{{!empty(Auth::user()->company_name) ? Auth::user()->company_name : ''}}">

                            <label>Country <span style="color: red;">*</span></label>
                            <input type="text" name="country" class="form-control" required value="{{!empty(Auth::user()->country) ? Auth::user()->country : ''}}">

                            <label>Street address <span style="color: red;">*</span></label>
                            <input type="text" name="address_one" class="form-control" placeholder="House number and Street name" required value="{{!empty(Auth::user()->address) ? Auth::user()->address : ''}}">
                            <input type="text" name="address_two" class="form-control" placeholder="Appartments, suite, unit etc ..."
                                required value="{{!empty(Auth::user()->address_two) ? Auth::user()->address_two : ''}}">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Town / City <span style="color: red;">*</span></label>
                                    <input type="text" name="city" class="form-control" required value="{{!empty(Auth::user()->city) ? Auth::user()->city : ''}}">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>State <span style="color: red;">*</span></label>
                                    <input type="text" name="state" class="form-control" required value="{{!empty(Auth::user()->state) ? Auth::user()->state : ''}}">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP <span style="color: red;">*</span></label>
                                    <input type="text" name="postcode" class="form-control" required value="{{!empty(Auth::user()->postcode) ? Auth::user()->postcode : ''}}">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone <span style="color: red;">*</span></label>
                                    <input type="tel" name="phone" class="form-control" required value="{{!empty(Auth::user()->phone) ? Auth::user()->phone : ''}}">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Email address <span style="color: red;">*</span></label>
                            <input type="email" name="email" class="form-control" required value="{{!empty(Auth::user()->email) ? Auth::user()->email : ''}}">

                            @if(empty(Auth::check()))
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_create" class="custom-control-input createAccount" id="checkout-create-acc">
                                <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                            </div><!-- End .custom-checkbox -->

                            <div id="showPassword" style="display: none;">
                            <label>Password <span style="color: red;">*</span></label>
                            <input type="text" id="inputPassword" name="password" class="form-control">
                            </div>
                            @endif

                            <label>Order notes (optional)</label>
                            <textarea class="form-control" name="notes" cols="30" rows="4"
                                placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (Cart::content() as $key => $data)
                                        @php
                                        $getCartProduct = App\Models\Product::getSingle($data->id);
                                        @endphp
                                        <tr>
                                            <td><a href="{{url($getCartProduct->slug)}}">{{$getCartProduct->title}}</a></td>
                                            <td>NPR {{number_format($data->price * $data->qty, 2)}}</td>
                                        </tr>
                                        @endforeach

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>NPR {{Cart::subTotal()}}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td colspan="2">
                                                <div class="cart-discount">
                                                        <div class="input-group">
                                                            <input type="text" name="discount_code" id="getDiscountCode" class="form-control" placeholder="Discount Code">
                                                            <div class="input-group-append">
                                                                <button id="ApplyDiscount" style="height:40px;" type="button" class="btn btn-outline-primary-2" type="submit"><i
                                                                        class="icon-long-arrow-right"></i></button>
                                                            </div>
                                                        </div>
                                                        <div style="margin-bottom: 20px; color:red; text-align:left;" id="messagediv"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Discount:</td>
                                            <td>NPR <span id="getDiscountAmount">0.00</span></td>
                                        </tr><!-- End .summary-subtotal -->
                                        
                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @foreach($getShipping as $shipping)
                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                <input type="radio" value="{{ $shipping->id }}" id="free-shipping{{ $shipping->id }}" name="shipping" required
                                                data-price="{{ !empty($shipping->price) ? $shipping->price : 0 }}"
                                                class="custom-control-input getShippingCharge">
                                                <label class="custom-control-label" for="free-shipping{{ $shipping->id }}">{{ $shipping->name }}</label>
                                                </div>
                                            </td>
                                            <td>
                                                @if(!empty($shipping->price))
                                                NPR {{ number_format($shipping->price,2) }}
                                                @endif
                                            </td>
                                        </tr><!-- End .summary-shipping-row -->
                                       @endforeach

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>NPR <span id="getPayableTotal">{{Cart::subTotal()}}</span></td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->
                                <input type="hidden" id="getShippingChargeTotal" value="0">
                                <input type="hidden" id="PayableTotal" value="{{ (float)str_replace(',', '', Cart::subTotal()) }}">

                                <div class="accordion-summary" id="accordion-payment">

                    @if(!empty($getPaymentSetting->is_cod))
                    <div class="custom-control custom-radio">
                    <input type="radio" value="cash" id="Cashondelivery" name="payment_method" required
                     class="custom-control-input">
                    <label class="custom-control-label" for="Cashondelivery">Cash on delivery</label>
                    </div>
                    @endif

                    @if(!empty($getPaymentSetting->is_esewa))
                    <div class="custom-control custom-radio" style="margin-top: 0px;">
                    <input type="radio" value="khalti" id="khalti" name="payment_method" required
                     class="custom-control-input">
                    <label class="custom-control-label" for="khalti">Khalti</label>
                    </div>
                    @endif

                    @if(!empty($getPaymentSetting->is_stripe))
                    <div class="custom-control custom-radio" style="margin-top: 0px;">
                    <input type="radio" value="stripe" id="CreditCard" name="payment_method" required
                     class="custom-control-input">
                    <label class="custom-control-label" for="CreditCard"> Credit Card (Stripe)</label>
                    </div>
                    @endif
                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                                <br /> <br />
                                <img src="{{ url('assets/images/payments-summary.png') }}">
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->

</main><!-- End .main -->



@endsection
@section('script')
<script type="text/javascript">

$('body').delegate('.createAccount', 'change', function() {
    if(this.checked)
    {
        $('#showPassword').show();
        $("#inputPassword").prop('required',true);
    }
    else
    {
        $('#showPassword').hide();
        $("#inputPassword").prop('required',false);
    }
});

$('body').delegate('#SubmitForm','submit',function(e){
    e.preventDefault();
    $.ajax({
        type : "POST",
        url : "{{ url('checkout/place_order') }}",
        data : new FormData(this),
        processData:false,
        contentType:false,
        dataType : "json",
        success: function(data) {
            $('#message').html(data.html);
            if(data.status == false)
            {
                alert(data.message);
            } 
            else
            {
                window.location.href = data.redirect;
            }  
        },
        error: function (data) {

        }
    });
});

    $('body').delegate('.getShippingCharge', 'change', function() {
				var price = $(this).attr('data-price');
				var total = $('#PayableTotal').val();
				$('#getShippingChargeTotal').val(price);
				var final_total = parseFloat(price) + parseFloat(total);
				$('#getPayableTotal').html(final_total.toFixed(2));

				
		});

    $('body').delegate('#ApplyDiscount', 'click', function() {
            var discount_code = $('#getDiscountCode').val();

            $.ajax({
                type : "POST",
                url : "{{ url('/checkout/apply_discount_code') }}",
                data : {
                	discount_code : discount_code,
                	"_token": "{{csrf_token()}}",
                },
                dataType : "json",
                success: function(data) {
                	$('#getDiscountAmount').html(data.discount_amount);
                	var shipping = $('#getShippingChargeTotal').val();

                	var final_total = parseFloat(shipping) + parseFloat(data.payable_total);

                	$('#getPayableTotal').html(final_total.toFixed(2));
                	$('#PayableTotal').val(data.payable_total);
                	
                    if(data.status == false)
                    {
                        $('#messagediv').html(data.html);
                    }
                   
                },
                error: function (data) {
                  
                }
            });  
       });
</script>
@endsection
