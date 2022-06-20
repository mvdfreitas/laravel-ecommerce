@extends('colaborador.painel')

@section('painel-content')
    <div class="container">
        @if (\Session::has('success'))
            <p class="alert alert-success">{!! \Session::get('success') !!}</p>
        @endif
        @if (\Session::has('error'))
            <p class="alert alert-danger">{!! \Session::get('error') !!}</p>
        @endif
        <h1>Editar Perfil</h1>
        <form method="post" action="{{ route('colaborador.role.update', $role->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            @include('colaborador.role.form')
        </form>
    </div>
@endsection
