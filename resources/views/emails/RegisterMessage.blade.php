

@component('mail::message')
<h1 style="font-family: 'RecoletaBold';color: #242938;line-height: 1.43;">Thank for registering to an {{ config('app.name') }}</h1>
<h2>Thank you for registering</h2>
<h3> Dear {{$data['name']}} </h3>
<p>I am reaching out to thank you for registering to  {{ config('app.name') }}</p>
<p>We will send you a reminder</p>
<p>Thank you for connecting with me.</p>
<p>Thank you again, and have great rest of the day,</p>
<h3>Email: {{$data['email']}}</h3>

Thanks,<br>
{{ config('app.name') }}
@endcomponent