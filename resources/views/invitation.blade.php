@component('mail::message')
# Invitation

You are invited to {{ $invitation->event->event }}.<br>
{!! $invitation->event->description !!}

@component('mail::button', ['url' => url('/accept/'.$invitation->id)])
Accept
@endcomponent

@component('mail::button', ['url' => url('/reject/'.$invitation->id), 'color' => 'red'])
Refuse
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
