@extends('layouts.app')
@section('title', 'Alunos')
@section('content')
<h2>Alunos</h2>
<a href="/alunos/create" class="btn btn-success mb-3">Novo Aluno</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($alunos as $a)
        <tr>
            <td>{{ $a->id_aluno }}</td>
            <td>{{ $a->nome }}</td>
            <td>{{ $a->cpf }}</td>
            <td>{{ $a->email }}</td>
            <td>{{ $a->telefone }}</td>
            <td class="d-flex gap-2">
                <a href="/alunos/{{ $a->id_aluno }}/edit" class="btn btn-sm btn-warning">Editar</a>
                <form action="/alunos/{{ $a->id_aluno }}" method="POST" onsubmit="return confirm('Excluir este aluno?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Nenhum aluno cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection