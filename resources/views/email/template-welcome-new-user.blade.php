<x-mail::message>
# Selamat Datang

Akaun anda telah berjayak dibuat.

<x-mail::button :url="$url">
View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
