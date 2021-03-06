@extends('layouts.head')

@section('content')
<div class="container w-50">
    <div class="titulo">
        Listagem de Sub fato
    </div>
    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Fato</th>
                    <th>Descrição</th>
                    <th style="width: 20%;">
                        <a href="{{ route('subfact.create') }}"
                            class="btn btn-info btn-sm">Novo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($register as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->fact->fact_description }}</td>
                        <td>{{ $value->subfact_description }}</td>                            
                        <td>
                            <a href="{{ route('subfact.edit', $value->id) }}"
                                class="btn btn-warning btn-sm">Editar</a>
                            <form method="POST"
                                action="{{ route('subfact.destroy',  $value->id) }}"
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
