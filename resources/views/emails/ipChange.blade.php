@component('mail::message')
Hi <b>{{ $user->name}}</b>
<p>You're almost ready to start enjoying the benefits of Rong Krishi Company.</p>


<p>Simply check the button below to change your password.</p>


<p>
    @component('mail::button',['url' => url('changePw/'.$user->remember_token)])
    Change Password
    @endcomponent
</p>

<p>This will change your password, and then you can access your account.</p>

<p>If you have any questions or need assistance recovering your password, feel free to <a href="{{url('/contact_us')}}">contact us</a>.</p>
@endcomponent
