@extends('main')

@section('title', '| Contact')

@section('content')

    <div class="flex-center position-ref ">
        <div class="center">
            <div class="title ">
                Contact
            </div>
            <p>Do not spam me</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <form class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                {{ csrf_field() }}
                <input class="form-control" id="name" name="name" type="text" placeholder="Name">
                <input class="form-control" id="email" name="email" type="email" placeholder="E-mail">
                <input class="form-control" id="subject" name="subject" type="text" placeholder="Subject">
                <textarea class="form-control" id="message" name="message" placeholder="Message"></textarea>
                <input class="center btn btn-success" id="submit" type="submit" value="Send it">
            </form>
        </div>
    </div>

@endsection