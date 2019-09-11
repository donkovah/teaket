@component('mail::message')
# Hello {{$teaket->user->first_name}},

You just opened a ticket "{{$teaket->title}}" on HRManager. An Admin would attend to you shortly.

Thank you for your time and have a nice day.
@component('mail::button', ['url' => route('teaket.show', ['teaket' => $teaket->slug])])
Details
@endcomponent

Kind Regards,<br>
{{ config('app.name') }}
@endcomponent
