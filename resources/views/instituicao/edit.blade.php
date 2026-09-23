@extends('layouts.app')
@section('title', 'Editar Instituição')
@section('content')
<h2>Editar Instituição</h2>
<form action="/instituicoes/{{ $instituicao->id_instituicao }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Nome</label><input type="text" name="nome" class="form-control" value="{{ $instituicao->nome }}" required></div>
    <div class="mb-3"><label class="form-label">Endereço</label><input type="text" name="endereco" class="form-control" value="{{ $instituicao->endereco }}"></div>
    <div class="mb-3"><label class="form-label">Contato</label><input type="text" name="contato" class="form-control" value="{{ $instituicao->contato }}"></div>
    <button class="btn btn-warning">Atualizar</button>
    <a href="/instituicoes" class="btn btn-secondary">Cancelar</a>
</form>
@endsection