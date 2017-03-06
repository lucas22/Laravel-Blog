@if ( \Illuminate\Support\Facades\Session::has('success') )

    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{ \Illuminate\Support\Facades\Session::get('success')  }}
    </div>

@elseif ( count($errors) > 0 )

    <div class="alert alert-danger" role="alert">
        <strong>Error:</strong>

        @foreach($errors->all() as $error)
            <li> {{ $error  }} </li>
        @endforeach

    </div>

@endif
