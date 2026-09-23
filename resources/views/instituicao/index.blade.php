@extends('layouts.app')
@section('title', 'Instituições')
@section('content')
<h2>Instituições</h2>
<a href="/instituicoes/create" class="btn btn-success mb-3">Nova Instituição</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Contato</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($instituicoes as $i)
        <tr>
            <td>{{ $i->id_instituicao }}</td>
            <td>{{ $i->nome }}</td>
            <td>{{ $i->endereco }}</td>
            <td>{{ $i->contato }}</td>
            <td class="d-flex gap-2">
                <a href="/instituicoes/{{ $i->id_instituicao }}/edit" class="btn btn-sm btn-warning">Editar</a>
                <form action="/instituicoes/{{ $i->id_instituicao }}" method="POST" onsubmit="return confirm('Excluir esta instituição?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Nenhuma instituição cadastrada.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection