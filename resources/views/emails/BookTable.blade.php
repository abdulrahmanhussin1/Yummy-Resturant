<x-mail::message>
    Welcome {{ $user->name }}
    <h2>Your booking was recieved Successfully</h2>
    we wanted to inform youu that we recieved your booking Successfully,
    and we are going to contact you as so as possile to confirm your booking

    Thank you for choosing our Resturant 

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
