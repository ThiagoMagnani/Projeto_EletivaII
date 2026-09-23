@extends('layouts.app')
@section('title', 'Editar Serviço')
@section('content')
<h2>Editar Serviço</h2>
<form action="/servicos/{{ $servico->id_servico }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Nome do Serviço</label><input type="text" name="nome_servico" class="form-control" value="{{ $servico->nome_servico }}" required></div>
    <div class="mb-3"><label class="form-label">Valor Base</label><input type="number" step="0.01" name="valor_base" class="form-control" value="{{ $servico->valor_base }}" required></div>
    <div class="mb-3"><label class="form-label">Descrição</label><textarea name="descricao" class="form-control">{{ $servico->descricao }}</textarea></div>
    <button class="btn btn-warning">Atualizar</button>
    <a href="/servicos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection