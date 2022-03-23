@extends('template-site.master')

@section('content')
        <br />
        <br />
        <div class="container">
            <div class="row">
                <aside class="col-md-6">
                    <h4 class="subtitle-doc"># Outros contatos
                        <a href="#" data-html="code_desc_simple" class="showcode">[code]</a>
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
                        </div> <!-- box.// -->
                    </div> <!-- code-wrap.// -->
                </aside>
                <aside class="col-sm-6">

                    <h4 class="subtitle-doc"># Contato
                        <a href="#" data-html="code_payment" class="showcode">[code]</a>
                    </h4>
                    <div id="code_payment">

                        <article class="card">
                            <div class="card-body p-5">
                                <p class="alert alert-success">Mensagem de sucesso!</p>

                                <form role="form">
                                    <div class="form-group">
                                        <label for="username">Nome</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="username" placeholder=""
                                                required="">
                                        </div> <!-- input-group.// -->
                                    </div> <!-- form-group.// -->

                                    <div class="form-group">
                                        <label for="cardNumber">E-mail</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="cardNumber" placeholder="">
                                        </div> <!-- input-group.// -->
                                    </div> <!-- form-group.// -->

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Texto</span> </label>
                                                <div class="form-inline">
                                                    <textarea class="form-control" style="width:100%"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row.// -->
                                    <button class="subscribe btn btn-primary btn-block" type="button"> Enviar </button>
                                </form>
                            </div> <!-- card-body.// -->
                        </article> <!-- card.// -->

                    </div> <!-- code-wrap.// -->

                </aside>
            </div>
        </div>
@endsection
