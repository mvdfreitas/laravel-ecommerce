@extends('template-site.master')

@section('content')
        <section class="container" style="margin-top: 50px">
            <div class="row">
                <aside class="col-sm-6">
                    <h3 class="subtitle-doc">Cadastro de cliente</h3>
                    <div id="code_register_1">
                        <div class="card">
                            <header class="card-header">
                                <a href="{{ route('login.index') }}" class="float-right btn btn-outline-primary mt-1">Entrar</a>
                                <h4 class="card-title mt-2">Cadastro</h4>
                            </header>
                            <article class="card-body">
                                @if (\Session::has('success'))
                                    <p class="alert alert-success">{!! \Session::get('success') !!}</p>
                                @endif
                                @if (\Session::has('error'))
                                    <p class="alert alert-danger">{!! \Session::get('error') !!}</p>
                                @endif
                                <form method="post" action="{{ route('cliente.save') }}">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome" value="{{ old('nome') }}">
                                            @error('nome')
                                                <span style="color:red;"><small>{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label for="cpf">CPF</label>
                                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o CPF" value="{{ old('cpf') }}">
                                            @error('cpf')
                                                <span style="color:red;"><small>{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col form-group">
                                            <label for="nascimento">Nascimento</label>
                                            <input type="text" id="nascimento" name="nascimento" class="form-control" placeholder="" value="{{ old('nascimento') }}">
                                            @error('nascimento')
                                                <span style="color:red;"><small>{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M">
                                            <span class="form-check-label"> Masculino </span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="sexo" value="F">
                                            <span class="form-check-label"> Feminino</span>
                                        </label>
                                        @error('sexo')
                                            <br><span style="color:red;"><small>{{ $message }}</span></small>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="telefone">Telefone</label>
                                            <input type="text" id="telefone" name="telefone" class="form-control" value="{{ old('telefone') }}">
                                            @error('telefone')
                                                <span style="color:red;"><small>{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="" value="{{ old('email') }}">
                                        @error('email')
                                            <span style="color:red;"><small>{{ $message }}</span></small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="senha">Senha</label>
                                        <input id="senha" name="senha" class="form-control" type="password" value="{{ old('senha') }}">
                                        @error('senha')
                                            <span style="color:red;"><small>{{ $message }}</span></small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Cadastrar </button>
                                    </div>
                                </form>
                            </article>
                            <div class="border-top card-body text-center">
                                Já possui uma conta? <a href="{{ route('login.index') }}">Entre</a></div>
                        </div>

                    </div>
                </aside>
            </div>
        </section>
@endsection
