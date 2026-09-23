@extends('layouts.app')
@section('title', 'Materiais')
@section('content')
<h2>Materiais</h2>
<a href="/materiais/create" class="btn btn-success mb-3">Novo Material</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Agendamento</th>
            <th>Arquivo</th>
            <th>Tipo</th>
            <th>Recebido em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($materiais as $m)
        <tr>
            <td>{{ $m->id_material }}</td>
            <td>#{{ $m->agendamento->id_agendamento ?? '—' }} - {{ $m->agendamento->data ?? '' }}</td>
            <td>{{ $m->nome_arquivo }}</td>
            <td>{{ $m->tipo }}</td>
            <td>{{ $m->data_recebimento }}</td>
            <td class="d-flex gap-2">
                <a href="/materiais/{{ $m->id_material }}/edit" class="btn btn-sm btn-warning">Editar</a>
                <form action="/materiais/{{ $m->id_material }}" method="POST" onsubmit="return confirm('Excluir este material?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Nenhum material cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection