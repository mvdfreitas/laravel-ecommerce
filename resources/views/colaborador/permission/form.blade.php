<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input class="form-control" placeholder="Digite o nome da permissão" id="nome" name="nome" value="{{ isset($permission->name) ? $permission->name : old('name') }}">
    @error('nome')
        <span style="color:red;"><small>{{ $message }}</span></small>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descrição</label>
    <input class="form-control" placeholder="Digite a descrição da permissão" id="description" name="description" value="{{ isset($permission->description) ? $permission->description : old('description') }}">
    @error('description')
        <span style="color:red;"><small>{{ $message }}</span></small>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Salvar</button>
<a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>

