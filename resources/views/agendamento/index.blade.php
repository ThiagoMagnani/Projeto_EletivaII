@extends('layouts.app')
@section('title', 'Agendamentos')
@section('content')
<h2>Agendamentos</h2>
<a href="/agendamentos/create" class="btn btn-success mb-3">Novo Registro</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Aluno</th>
            <th>Serviço</th>
            <th>Instituição</th>
            <th>Pagamento</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($agendamento as $a)
        <tr>
            <td>{{ $a->id_agendamento }}</td>
            <td>{{ $a->aluno->nome ?? '—' }}</td>
            <td>{{ $a->servico->nome_servico ?? '—' }}</td>
            <td>{{ $a->instituicao->nome ?? '—' }}</td>
            <td>{{ $a->pagamento->forma_pagamento ?? '—' }}</td>
            <td>{{ $a->data }}</td>
            <td>{{ $a->horario }}</td>
            <td>{{ $a->status }}</td>
            <td class="d-flex gap-2">
                <a href="/agendamentos/{{ $a->id_agendamento }}/edit" class="btn btn-sm btn-warning">Editar</a>
                <a href="/agendamentos/{{ $a->id_agendamento }}" class="btn btn-sm btn-info">Consultar</a>
                <form action="/agendamentos/{{ $a->id_agendamento }}" method="POST" onsubmit="return confirm('Excluir este agendamento?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">Nenhum agendamento encontrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection