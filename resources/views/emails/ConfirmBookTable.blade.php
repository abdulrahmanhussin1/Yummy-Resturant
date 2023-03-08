<x-mail::message>
    Welcome {{ $user->name }}
    <h2>Your Booking Table confirmed Successfully</h2>
    we wanted to inform youu that we confirmed your booking  Successfully,
    and we can not wait to serve you in our Resturant

    <h3>Booking Details</h3>
    Date : {{ $user->date }}
    Time : {{ $user->time }}
    Count of Guest : {{ $user->people }}


    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
