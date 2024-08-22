@if (session()->has('message'))
    <p>{{ session('message') }}</p>
@endif
<p>Silahkan cek email</p>
<form action="/email/verification-notification" method="post">
    <button type="submit">Click here to send another</button>
</form>
