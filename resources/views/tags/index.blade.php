@extends('main')

@section('title', '| All Tags')

@section('content')

    <h1>Tags</h1>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="well">
                <form action="{{ route('tags.store') }}" method="POST" class="form-group">
                    {{ csrf_field() }}
                    <input style="text-align: center" type="text" class="form-control" name="name" placeholder="Tag name">
                    <input type="submit" class="form-control btn btn-primary" value="Create tag">
                </form>
            </div>
        </div>
    </div>

@endsection