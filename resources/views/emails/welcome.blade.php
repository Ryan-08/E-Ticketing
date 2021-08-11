@component('mail::message') 
# Selamat Datang di E-ticketing

Selamat datang di E-ticketing.<br />
Akun anda telah berhasil dibuat dengan username/email dan password seperti dibawah ini.<br />
Email: {{ $data['email'] }}<br />
Password: {{ $data['password'] }}<br />

@component('mail::button', ['url' => 'http://127.0.0.1:8000']) 
Login
@endcomponent 

Thanks,<br />
{{ config("app.name") }}
@endcomponent
