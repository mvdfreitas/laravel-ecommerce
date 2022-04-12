@extends('template-site.master')

@section('content')
        <br />
        <br />
        <section class="container">
            <aside class="col-sm-4">
                <h3 class="subtitle-doc">
                    Login
                </h3>
                <div id="code_login_1">
                    <div class="card">
                        <article class="card-body">
                            @if (\Session::has('success'))
                                <p class="alert alert-success">{!! \Session::get('success') !!}</p>
                            @endif
                            @if (\Session::has('error'))
                                <p class="alert alert-danger">{!! \Session::get('error') !!}</p>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <a href="{{ route('cliente.create') }}" class="float-right btn btn-outline-primary">Cadastrar-se</a>
                            <h4 class="card-title mb-4 mt-1">Entrar</h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input name="email" class="form-control" placeholder="Email" type="email">
                                </div>
                                <div class="form-group">
                                    <a class="float-right" href="#">Esqueceu?</a>
                                    <label>Senha</label>
                                    <input name="password" class="form-control" placeholder="******" type="password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Acessar </button>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </aside>
        </section>
@endsection
