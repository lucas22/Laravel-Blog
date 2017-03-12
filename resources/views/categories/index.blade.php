@extends('main')

@section('title', '| All Categories')

@section('content')

    <h1>Categories</h1>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="well">
                <form action="{{ route('categories.store') }}" method="POST" class="form-group">
                    {{ csrf_field() }}
                    <input style="text-align: center" type="text" class="form-control" name="name" placeholder="Category name">
                    <input type="submit" class="form-control btn btn-primary" value="Create category">
                </form>
            </div>
        </div>
    </div>

@endsection