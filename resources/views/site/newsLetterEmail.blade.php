<form role="form" method="post" action="{{ route('home.newsLetterEmail') }}" id="news-letter">
    {{ csrf_field() }}
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="form-group">
                    <label for="email">Cadastre seu e-mail para receber promoções</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-at"></i></span>
                        </div>
                        <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ old('email') }}">
                        <div class="col-sm-3">
                            <button type="submit" class="subscribe btn btn-primary btn-block" type="button"> Enviar </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 offset-sm-3">
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
            </div>

        </div>
    </div>
</form>
