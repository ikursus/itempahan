<x-mail::message>



Selamat datang {{ $user->name }}, terima kasih telah mendaftar di {{ config('app.name') }}.

Untuk login, sila klik link dibawah ini:

<x-mail::button :url="$url">


Login Akaun


</x-mail::button>

Terima kasih,<br>



{{ config('app.name') }}


</x-mail::message>
