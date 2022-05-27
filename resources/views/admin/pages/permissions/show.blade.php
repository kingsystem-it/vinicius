@extends('adminlte::page')

@section('title', 'Detalhes da permissão')

@section('content_header')
    <h1>Detalhes do permissão {{$permission->name}}</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$permission->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$permission->description}}
                </li>
            </ul>

            <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
    @stop