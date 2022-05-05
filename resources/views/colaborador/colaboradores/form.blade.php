<span id="form">
    <div class="form-row">
        <div class="col form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome" v-model="nome">
            @error('nome')
                <span style="color:red;"><small>{{ $message }}</span></small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="" v-model="email">
        @error('email')
            <span style="color:red;"><small>{{ $message }}</span></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input id="password" name="password" class="form-control" type="password">
        @error('password')
            <span style="color:red;"><small>{{ $message }}</span></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmação de Senha</label>
        <input id="password_confirmation" name="password_confirmation" class="form-control" type="password">
        @error('password')
            <span style="color:red;"><small>{{ $message }}</span></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control" id="tipo" name="tipo" v-model="tipo">
            <option>Comum</option>
            <option>Gerente</option>
        </select>
        @error('tipo')
        <span style="color:red;"><small>{{ $message }}</span></small>
        @enderror
    </div>
    <input type="hidden" name="edit" v-model="edit" />
    <div class="form-group">
        <button type="submit" class="btn btn-primary"> Salvar </button>
        <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary"> Voltar </a>
    </div>
</span>

@section('js')
<script>
    new Vue({
        el: "#form",
        data() {
            return {
                nome: @json(isset($colaborador->nome) ? $colaborador->nome : old('nome')),
                email: @json(isset($colaborador->email) ? $colaborador->email : old('email')),
                tipo: @json(isset($colaborador->tipo) ? $colaborador->tipo : old('tipo')),
                edit: @json($edit)
            }
        },
    })
</script>
@endsection
