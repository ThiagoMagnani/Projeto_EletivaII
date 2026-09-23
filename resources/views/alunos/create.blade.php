@extends('layouts.app')
@section('title', 'Novo Aluno')
@section('content')
<h2>Novo Aluno</h2>
<form action="/alunos" method="POST">
    @csrf
    <div class="mb-3"><label class="form-label">Nome</label><input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required></div>
    <div class="mb-3"><label class="form-label">CPF</label><input type="text" name="cpf" class="form-control" value="{{ old('cpf') }}" required></div>
    <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}"></div>
    <div class="mb-3"><label class="form-label">Telefone</label><input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}"></div>
    <button class="btn btn-success">Salvar</button>
    <a href="/alunos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection