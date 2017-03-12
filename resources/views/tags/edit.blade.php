@extends('main')

@section('title', "| Edit Tag")

@section('content')

    <div class="row">
        <form action="{{ route('tags.update', $tag->id) }}" method="POST" class="form-group">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <input type="text" class="form-control" placeholder="Tag Name" name="name">
            <input type="submit" class="btn btn-success" value="Save changes">
        </form>
    </div>

@endsection