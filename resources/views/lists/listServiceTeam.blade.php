@extends('layouts.head')

@php
    //dd($register);

@endphp
@section('content')
<div class="container">
    <div class="titulo">
        Listagem Equipe de Serviço
    </div>
    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th class="">Data</th>
                    <th class="">Nome</th>
                    <th class="">Horas</th>
                    <th class="">OPM</th>
                    <th class="">Localidade</th>
                    <th class="">Função</th>
                    <th class="">Viatura</th>                    
                    <th class="">Status</th>
                    <th>
                        <a href="{{ route('serviceteam.create') }}"
                            class="btn btn-info btn-sm">Nova Equipe</a>
                    </th>
                  
                </tr>
            </thead>
            <tbody>
                @forelse($register as $value)
                    <tr>
                        {{-- dd($value->militaryServer) --}}
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->date }}</td>
                        <td>{{ $value->militaryServer->position->sigla.' '.$value->militaryServer->nome_guerra }}</td>
                        <td>{{ $value->hour_shift }}</td>
                        <td>{{ $value->militaryOrganization->sigla }}</td>
                        <td>{{ $value->locality->descricao }}</td>
                        <td>{{ $value->teamFunction->description_function ?? 'Vazio !' }}</td>
                        <td>{{ $value->vehicle_id }}</td>
                        <td>{{ $value->service_status }}</td>

                                          
                        <td>
                            <a href="{{ route('serviceteam.edit', $value->id) }}"
                                class="btn btn-warning btn-sm">Editar</a>
                            <form method="POST"
                                action="{{ route('serviceteam.destroy',  $value->id) }}"
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
