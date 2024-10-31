@component('mail::message')
Hi <b>{{ $user->name}}</b>
<p>You're almost ready to start enjoying the benefits of Rong Krishi Company.</p>


<p>Simply check the button below to verify your email address.</p>


<p>
    @component('mail::button',['url' => url('activate/'.base64_encode($user->id))])
    verify
    @endcomponent
</p>

<p>This will verify your email address, and then you'll officially be a part of the Rong Krishi Company.</p>
<p>For security reasons, we recommend that you to change your password using given credentials:</p>

<p><b>Email:</b> {{$user->email}}</p>



<p>If you have any questions or need assistance, feel free to <a href="{{url('/contact_us')}}">contact us</a>.</p>
@endcomponent
