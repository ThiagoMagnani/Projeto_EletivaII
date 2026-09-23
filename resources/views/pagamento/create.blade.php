@extends('layouts.app')
@section('title', 'Novo Pagamento')
@section('content')
<h2>Novo Pagamento</h2>
<form action="/pagamentos" method="POST">
    @csrf
    <div class="mb-3"><label class="form-label">Valor</label><input type="number" step="0.01" name="valor" class="form-control" value="{{ old('valor') }}" required></div>
    <div class="mb-3"><label class="form-label">Data do Pagamento</label><input type="date" name="data_pagamento" class="form-control" value="{{ old('data_pagamento') }}"></div>
    <div class="mb-3"><label class="form-label">Forma de Pagamento</label>
        <select name="forma_pagamento" class="form-select">
            <option value="dinheiro">Dinheiro</option>
            <option value="pix">Pix</option>
            <option value="cartao">Cartão</option>
            <option value="boleto">Boleto</option>
        </select>
    </div>
    <button class="btn btn-success">Salvar</button>
    <a href="/pagamentos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection