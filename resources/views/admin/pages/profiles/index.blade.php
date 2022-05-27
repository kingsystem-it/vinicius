@extends('adminlte::page')

@section('title', "Perfis")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.index')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('profiles.index')}}">Perfils</a>
    </li>
</ol>
    <h1>Perfis <a href="{{route('profiles.create')}}" class="btn btn-dark"><i class="fas fa-plus-circle"></i></a></h1> 
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" 
                value="{{$filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></i></button>

            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                    <tr>
                        <td>
                            {{$profile->name}}
                        </td>
                        <td style="width=10">
                            <a href="{{route('profiles.show', $profile->id)}}" class="btn btn-primary">Detalhes</a>
                            <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="{{route('profile.permissions', $profile->id)}}" class="btn btn-warning"><i class="fas fa-lock"></i></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop