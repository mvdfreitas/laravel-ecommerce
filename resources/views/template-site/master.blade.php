<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')

        @hasSection ('css')
            @yield('css')
        @endif
    </head>
    <body>
        @include('includes.header')

        <main role="main">
            @yield('content')

            <hr class="featurette-divider">
            <footer class="container">
                <p class="float-right"><a href="#">Back to top</a></p>
                <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>
        </main>


        <script src="{{ asset('/js/holder.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('/js/popper.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        @hasSection('js')
            @yield('js')
        @endif
    </body>
</html>
