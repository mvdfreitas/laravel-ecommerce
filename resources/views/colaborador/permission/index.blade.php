@extends('colaborador.painel')

@section('painel-content')
<span id="permission_index">
    <div class="container">
        @if ($success)
            <p class="alert alert-success">{{ $success }}</p>
        @endif
        @if ($error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endif
        <h1>Permissões</h1>

        {{-- @if(auth()->user()->can('criar-permissao')) --}}
            <p>
                <a href="{{ route('colaborador.permission.create') }}" class="btn btn-primary">Cadastrar</a>
            </p>
        {{-- @endif --}}

        @if($permissions)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $permission->id }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td>
                                {{-- @if(auth()->user()->can('editar-permissao')) --}}
                                    <a href="{{ route('colaborador.permission.edit', $permission->id) }}" class="btn btn-secondary">Editar</a>
                                {{-- @endif --}}
                                {{-- @if(auth()->user()->can('excluir-permissao')) --}}
                                    <button class="btn btn-danger" type="button" name="button" title="Excluir" @click="deletePermission('{{ $permission->name }}','{{ $permission->id }}')"> Excluir </button>
                                {{-- @endif --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <form action="" id="delete_form" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <modal-confirmation :delay="100" name="delete_permission" title="Excluir Permissão" height="auto">
                    Deseja excluir a permissão <b>@{{ permissionName }}</b> ?
                    <div slot="buttons">
                        <button @click="confirmDelete()" style="float: right;" class="btn btn-danger" type="submit" name="button">
                            Excluir
                        </button>
                    </div>
                </modal-confirmation>
            </form>

            {{ $permissions->links() }}
        @else
            <div>
                <span>Nenhum registro cadastrado.</span>
            </div>
        @endif
    </div>
</span>
@endsection

@section('js')
    <script>
        new Vue({
            el:'#permission_index',
            data(){
                return {
                    permissionId: '',
                    permissionName: ''
                }
            },
            methods:{
                deletePermission: function(permissionName, permissionId){
                    this.permissionId = permissionId
                    this.permissionName = permissionName
                    var url = '{{ route("colaborador.permission.destroy", ":id") }}';
                    url = url.replace(':id', this.permissionId);
                    $("#delete_form").attr('action', url);
                    this.$modal.show('delete_permission')
                },
                confirmDelete(){
                    $("#delete_form").submit();
                }
            }
        });
    </script>
@endsection
