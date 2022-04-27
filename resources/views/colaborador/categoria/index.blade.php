@extends('colaborador.painel')

@section('painel-content')
<div class="container">
    @if ($success)
        <p class="alert alert-success">{{ $success }}</p>
    @endif
    @if ($error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endif
    <h1>Categoria</h1>

    <a href="{{ route('colaborador.categoria.create') }}" class="btn btn-primary">Cadastrar</a>

    @if($categorias)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <th scope="row">{{ $categoria->id }}</th>
                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->categoria_pai_id > 0 ? $categoria->getCategoriaPaiNome() : ''}}</td>
                        <td>
                            <a href="{{ route('colaborador.categoria.edit', $categoria->id) }}" class="btn btn-secondary">Editar</a>
                            <a href="#" class="btn btn-danger" id="deleteCategoria" onclick="deleteCategoria({{ $categoria->id }}, event)">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $categorias->links() }}
    @else
        <div>
            <span>Nenhum registro cadastrado.</span>
        </div>
    @endif

</div>
@endsection

@section('js')
<script>
    function deleteCategoria(id,e){
        if(!confirm("Deseja mesmo excluir esse registro?")) {
            return false;
        }
        e.preventDefault();
        var token = $("meta[name='csrf-token']").attr("content");
        var url = e.target;

        $.ajax(
            {
                url: url.href,
                type: 'DELETE',
                data: {
                    _token: token,
                    id: id
                },
                success: function (response){
                    location.reload()
                }
            }
        )
        return false
    }
</script>
@endsection
