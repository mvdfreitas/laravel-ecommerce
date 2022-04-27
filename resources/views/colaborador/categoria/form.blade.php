
<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input class="form-control" placeholder="Digite o nome da categoria" id="nome" name="nome" value="{{ isset($categoria->nome) ? $categoria->nome : old('nome') }}">
    @error('nome')
        <span style="color:red;"><small>{{ $message }}</span></small>
    @enderror
</div>
<div class="mb-3">
    <label for="categoria_pai_id" class="form-label">Categoria Pai</label>
    <select class="form-control" name="categoria_pai_id">
        @foreach($categorias as $categoriaPai)
            <option value="{{ $categoriaPai->id }}"
                @if(isset($categoria->categoria_pai_id))
                    {{ ($categoria->categoria_pai_id == $categoriaPai->id) ? 'selected' : '' }}
                @endif
            >
                {{ $categoriaPai->nome }}
            </option>
        @endforeach
    </select>
    @error('categoria_pai_id')
        <span style="color:red;"><small>{{ $message }}</span></small>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Salvar</button>
<a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>

