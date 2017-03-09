<!DOCTYPE html>
<html lang="en">

    @include('partials.head')
    @yield('stylesheets')                       <!-- styles for each page -->

    <body>

        @include('partials.nav')

        <div class="container">
            @include('partials.messages')       <!-- flash messages: success & error -->
            @yield('content')                   <!-- page's content -->
        </div>

        @include('partials.footer')

    </body>

    @include('partials.javascript')             <!-- general scripts -->
    @yield('scripts')                           <!-- scripts for each page -->

</html>