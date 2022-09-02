@component('mail::message')
# Introduction
<h2> Email: {{$data['email']}} </h2>
The body of your message.
<p>Can you forget your password then click this button</p>
<p>Token: {{$data['token']}}</p>
@component('mail::button', ['url' => 'http://localhost:8000/password-change/'.$data['token']])
Reset Password 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
