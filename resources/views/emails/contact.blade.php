@extends('emails.main')

@section('content')

    <div class="container">
        <p>You have a new contact via the contact form sent by: <br><strong>{{ $name }}</strong> ({{ $email }})</p>

        <div class="message-block">
            <h5 style="text-transform: uppercase; font-weight: bold;">Message:</h5>
            <div class="message">
                {{ $bodyMessage }}
            </div>
        </div>
    </div>

@endsection