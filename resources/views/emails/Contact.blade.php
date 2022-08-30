@component('mail::message')
@if(isset($data['user']))
    <h2>Dear, {{$data['name']}}</h2>
    <p>Thank you for your email! We are more than happy to help you</p>
    <p>We will catch you as soon as possible</p>
    <p>Have a nice day</p>
@else
    <h2>Customer name:  {{$data['name']}}</h2>
    <h3>Customer Email: {{$data['email']}}</h3>
    <h3>Costomer Phone Number: {{$data['phone']}}</h3>
    <p>Message: {{$data['message']}}</p>
@endif
Thanks,<br>
{{ config('app.name') }}

@endcomponent
