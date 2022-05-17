@extends('adminlte::page')

@section('title', "Plano")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.index')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('plans.index')}}">Planos</a>
    </li>
</ol>
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark"><i class="fas fa-plus-circle"></i></a></h1> 
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" 
                value="{{$filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></i></button>

            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width=250>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                    <tr style="width:10px">
                        <td>
                            {{$plan->name}}
                        </td>
                        <td>
                            {{$plan->price}}
                        </td>
                        <td>
                            <a href="{{route('details.plan.index', $plan->url)}}" class="btn btn-primary">Detalhes</a>
                            <a href="{{route('plans.show', $plan->url)}}" class="btn btn-warning">VER</a>
                            <a href="{{route('plans.edit', $plan->url)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop