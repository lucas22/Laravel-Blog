<!DOCTYPE html>
<html lang="en">

    @include('partials.head')

    <body>

        @include('partials.nav')

        <div class="container">
            @include('partials.messages')
            @yield('content')
        </div>

        @include('partials.footer')

    </body>

    @include('partials.javascript')

</html>