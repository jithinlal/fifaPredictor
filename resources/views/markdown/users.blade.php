@component('mail:message')

{{-- @component('mail:header', ['url' => 'www.wcpredict.club'])
wcpredict.club
@endcomponent --}}

@component('mail::panel')
# Hurry!
@endcomponent

You have just one hour to finish up your predictions before the game.

@component('mail::button', ['url' => 'www.wcpredict.club'])
Predict Now
@endcomponent

