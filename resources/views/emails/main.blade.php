<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

@include('emails.partials.styles')

<body>

    @include('emails.partials.header')

    @yield('content')                   <!-- page's content -->

    @include('emails.partials.footer')

</body>

</html>