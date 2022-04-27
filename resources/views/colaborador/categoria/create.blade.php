@extends('colaborador.painel')

@section('painel-content')
    <div class="container">
        @if (\Session::has('success'))
            <p class="alert alert-success">{!! \Session::get('success') !!}</p>
        @endif
        @if (\Session::has('error'))
            <p class="alert alert-danger">{!! \Session::get('error') !!}</p>
        @endif
        <h1>Cadastrar Categoria</h1>
        <form method="post" action="{{ route('colaborador.categoria.store') }}">
            {{ csrf_field() }}
            @include('colaborador.categoria.form')
        </form>
    </div>
@endsection
