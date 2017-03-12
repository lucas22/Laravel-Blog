@extends('main')

@section('title', '| Contact')

@section('content')

    <div class="container">

        <div class="row">
            <h1>Settings</h1>
            <p>Choose your personal settings</p>
        </div>

        <div class="row col-lg-6 col-md-8 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2">
            <form action="{{ url('contact') }}" method="POST" class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                {{ csrf_field() }}
                <div class="row">
                    <h6 class="settings-section">User preferences</h6>
                </div>
                <div class="row form-row">
                    <label class="switch" for="id1">Configuration number one</label>
                    <input class="pull-right" type="checkbox" name="email_newsletter" id="id1">
                </div>
                <div class="row form-row">
                    <label class="switch" for="id2">Check me or don't</label>
                    <input class="pull-right" type="checkbox" name="email_comments" id="id2">
                </div>

                <hr>

                <div class="row">
                    <h6 class="settings-section">E-mail notifications</h6>
                </div>
                <div class="row form-row">
                    <label class="switch" for="newsletter">Newsletter</label>
                    <input class="pull-right" type="checkbox" name="email_newsletter" id="newsletter">
                </div>
                <div class="row form-row">
                    <label class="switch" for="newsletter">New comments on my posts</label>
                    <input class="pull-right" type="checkbox" name="email_comments" id="comments">
                </div>

            </form>
        </div>
    </div>

@endsection