@component('mail::message')

To finish restore your password go follow this link.

@component('mail::button', ['url' => $url])
Continue restore
@endcomponent

Thanks!

@endcomponent
