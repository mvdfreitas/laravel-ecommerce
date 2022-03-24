@extends('template-site.master')

@section('content')
        <br />
        <br />
        <div class="container">
            <div class="row">
                <aside class="col-md-6">
                    <h4 class="subtitle-doc">
                        # Outros contatos
                    </h4>
                    <div id="code_desc_simple">
                        <div class="box">
                            <dl>
                                <dt>Devolução/Garantia: </dt>
                                <dd>devolucao@lojavirtual.com.br</dd>
                            </dl>
                            <dl>
                                <dt>Televendas: </dt>
                                <dd>(61) 4000-2000</dd>
                            </dl>
                            <dl>
                                <dt>SAC:</dt>
                                <dd>sac@lojavirtual.com.br</dd>
                            </dl>
                        </div>
                    </div>
                </aside>
                <aside class="col-sm-6">

                    <h4 class="subtitle-doc">
                        # Contato
                    </h4>
                    <div>
                        <article class="card">
                            <div class="card-body p-5">

                                @if (\Session::has('success'))
                                    <p class="alert alert-success">{!! \Session::get('success') !!}</p>
                                @endif
                                @if (\Session::has('error'))
                                    <p class="alert alert-danger">{!! \Session::get('error') !!}</p>
                                @endif

                                <form role="form" method="post" action="{{ route('contato.send') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder=""
                                                required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="">
                                        </div> <!-- input-group.// -->
                                    </div> <!-- form-group.// -->

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="texto"><span class="hidden-xs">Texto</span> </label>
                                                <div class="form-inline">
                                                    <textarea class="form-control" name="texto" id="texto" style="width:100%"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="subscribe btn btn-primary btn-block" type="button"> Enviar </button>
                                </form>
                            </div>
                        </article>
                    </div>
                </aside>
            </div>
        </div>
@endsection
