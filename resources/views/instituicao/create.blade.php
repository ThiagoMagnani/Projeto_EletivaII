@extends('layouts.app')
@section('title', 'Nova Instituição')
@section('content')
<h2>Nova Instituição</h2>
<form action="/instituicoes" method="POST">
    @csrf
    <div class="mb-3"><label class="form-label">Nome</label><input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required></div>
    <div class="mb-3"><label class="form-label">Endereço</label><input type="text" name="endereco" class="form-control" value="{{ old('endereco') }}"></div>
    <div class="mb-3"><label class="form-label">Contato</label><input type="text" name="contato" class="form-control" value="{{ old('contato') }}"></div>
    <button class="btn btn-success">Salvar</button>
    <a href="/instituicoes" class="btn btn-secondary">Cancelar</a>
</form>
@endsection