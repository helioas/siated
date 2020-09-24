@extends('layouts.head')

@section('content')
<div class="container w-50">
    <div class="titulo">
        Listagem Tipo de Viaturas
    </div>
    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th class="w-75">Descrição</th>
                    <th>
                        <a href="{{ route('ServiceTeam.create') }}"
                            class="btn btn-info btn-sm">Novo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($register as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->type_description }}</td>
                        <td>
                            <a href="{{ route('ServiceTeam.edit', $value->id) }}"
                                class="btn btn-warning btn-sm">Editar</a>
                            <form method="POST"
                                action="{{ route('ServiceTeam.destroy',  $value->id) }}"
                                style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhum registro encontrado para listar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
