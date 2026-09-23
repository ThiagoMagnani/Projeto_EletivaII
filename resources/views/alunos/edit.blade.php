@extends('layouts.app')
@section('title', 'Editar Aluno')
@section('content')
<h2>Editar Aluno</h2>
<form action="/alunos/{{ $aluno->id_aluno }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Nome</label><input type="text" name="nome" class="form-control" value="{{ $aluno->nome }}" required></div>
    <div class="mb-3"><label class="form-label">CPF</label><input type="text" name="cpf" class="form-control" value="{{ $aluno->cpf }}" required></div>
    <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ $aluno->email }}"></div>
    <div class="mb-3"><label class="form-label">Telefone</label><input type="text" name="telefone" class="form-control" value="{{ $aluno->telefone }}"></div>
    <button class="btn btn-warning">Atualizar</button>
    <a href="/alunos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection