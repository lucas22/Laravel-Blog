@extends('main')

@section('title', '| About')

@section('content')

    <div class="flex-center position-ref full-height">
        <div class="center">
            <div class="title ">
                About {{ $contact_data['fullname'] }}
            </div>
            <p>This is just a demo created with Laravel</p>
            <p>{{ $contact_data['email']  }}</p>
        </div>
    </div>

@endsection
