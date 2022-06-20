@extends('colaborador.painel')

@section('painel-content')
<span id="role_index">
    <div class="container">
        @if ($success)
            <p class="alert alert-success">{{ $success }}</p>
        @endif
        @if ($error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endif
        <h1>Perfis</h1>

        <a href="{{ route('colaborador.role.create') }}" class="btn btn-primary">Cadastrar</a>

        @if($roles)
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
                        @foreach($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->id }}</th>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a href="{{ route('colaborador.role.edit', $role->id) }}" class="btn btn-secondary">Editar</a>

                                <button class="btn btn-danger" type="button" name="button" title="Excluir"
                                    @click="deleteRole('{{ $role->name }}','{{ $role->id }}')"> Excluir
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <form action="" id="delete_form" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <modal-confirmation :delay="100" name="delete_role" title="Excluir Perfil" height="auto">
                    Deseja excluir o perfil <b>@{{ roleName }}</b> ?
                    <div slot="buttons">
                        <button @click="confirmDelete()" style="float: right;" class="btn btn-danger" type="submit" name="button">
                            Excluir
                        </button>
                    </div>
                </modal-confirmation>
            </form>

            {{ $roles->links() }}
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
            el:'#role_index',
            data(){
                return {
                    roleId: '',
                    roleName: ''
                }
            },
            methods:{
                deleteRole: function(roleName, roleId){
                    this.roleId = roleId
                    this.roleName = roleName
                    var url = '{{ route("colaborador.role.destroy", ":id") }}';
                    url = url.replace(':id', this.roleId);
                    $("#delete_form").attr('action', url);
                    this.$modal.show('delete_role')
                },
                confirmDelete(){
                    $("#delete_form").submit();
                }
            }
        });
    </script>
@endsection
