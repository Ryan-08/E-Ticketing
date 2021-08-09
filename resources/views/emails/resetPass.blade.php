@component('mail::message') 
# Reset Password

Silahkan tekan tombol dibawah ini untuk melakukan reset password.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/dashboard']) 
Reset Password 
@endcomponent 

Thanks,<br />
{{ config("app.name") }}
@endcomponent