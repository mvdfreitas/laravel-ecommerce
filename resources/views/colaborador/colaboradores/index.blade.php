@extends('colaborador.painel')

@section('painel-content')
<div class="container">
    @if ($success)
        <p class="alert alert-success">{{ $success }}</p>
    @endif
    @if ($error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endif
    <h1>Colaboradores</h1>

    <p>
        <a href="{{ route('colaborador.colaboradores.create') }}" class="btn btn-primary">Cadastrar</a>
    </p>

    @if($colaboradores)
        <div class="table-responsive" id="form_index">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colaboradores as $colaborador)
                    <tr>
                        <th scope="row">{{ $colaborador->id }}</th>
                        <td>{{ $colaborador->nome }}</td>
                        <td>{{ $colaborador->email }}</td>
                        <td>{{ $colaborador->tipo }}</td>
                        <td>
                            <a href="{{ route('colaborador.colaboradores.edit', $colaborador->id) }}" class="btn btn-secondary">Editar</a>
                            <a href="#" class="btn btn-danger" id="deleteColaborador"
                            @click="deleteColaborador()"
                            route="{{ route('colaborador.colaboradores.delete', $colaborador->id) }}">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $colaboradores->links() }}
    @else
        <div>
            <span>Nenhum registro cadastrado.</span>
        </div>
    @endif

</div>
@endsection

@section('js')
<script>
    new Vue({
        el: '#form_index',
        methods: {
            deleteColaborador(){
                var route = document.getElementById('deleteColaborador').getAttribute('route')

                if(!confirm("Deseja mesmo excluir esse registro?")) {
                    return false;
                }

                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax(
                    {
                        url: route,
                        type: 'DELETE',
                        data: {
                            _token: token,
                        },
                        success: function (response){
                            location.reload()
                        }
                    }
                )
                return false
            }
        }
    })
</script>
@endsection
