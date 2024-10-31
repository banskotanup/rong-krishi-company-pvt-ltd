@component('mail::message')
Hi <b>{{ $user->name}}</b>
<p>We understand it happens.</p>


<p>Simply check the button below to reset your password.</p>


<p>
    @component('mail::button',['url' => url('reset/'.$user->remember_token)])
    Reset Your Password
    @endcomponent
</p>

<p>This will reset your password, and then you can access your account with new password.</p>

<p>If you have any questions or need assistance recovering your password, feel free to <a href="{{url('/contact_us')}}">contact us</a>.</p>
@endcomponent