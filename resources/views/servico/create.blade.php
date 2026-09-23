@extends('layouts.app')
@section('title', 'Novo Serviço')
@section('content')
<h2>Novo Serviço</h2>
<form action="/servicos" method="POST">
    @csrf
    <div class="mb-3"><label class="form-label">Nome do Serviço</label><input type="text" name="nome_servico" class="form-control" value="{{ old('nome_servico') }}" required></div>
    <div class="mb-3"><label class="form-label">Valor Base</label><input type="number" step="0.01" name="valor_base" class="form-control" value="{{ old('valor_base') }}" required></div>
    <div class="mb-3"><label class="form-label">Descrição</label><textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea></div>
    <button class="btn btn-success">Salvar</button>
    <a href="/servicos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection