<!doctype html>

<html lang="pt-br">

@include('colaborador.layout.includes.head')

<body>

    @include('colaborador.layout.includes.nav-top')

    <div class="container-fluid"></div>
        <div class="row">
            @include('colaborador.layout.includes.nav-side')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('painel-content')
            </main>
        </div>
    </div>

    <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/feather.js') }}"></script>
    <script src="{{ asset('/js/charts.js') }}"></script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
    @hasSection('js')
        @yield('js')
    @endif
</body>

</html>
