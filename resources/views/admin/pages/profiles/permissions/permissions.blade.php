@extends('adminlte::page')

@section('title', "Permissões do Perfil")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.index')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('permissions.index')}}">Perfils</a>
    </li>
</ol>
    <h1>Permissões do Perfil</h1> 
        <a href="{{route('profile.permissions.available', $profile->id)}}" class="btn btn-dark"><i class="fas fa-plus-circle"></i>
        Adicionar Nova Permissão
        </a>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>
                            {{$permission->name}}
                        </td>
                        <td style="width=10">                            
                            <a href="{{route('profile.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-danger">Desvincular</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop