<x-mail::message>
Welcome {{ $user->name }}
<h2>Your Message recieved Successfully</h2>
we wanted to inform youu that we recieved your message Successfully,
 and we are going to contact you as so as possile

<x-mail::button :url=" '' ">
vist our Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
