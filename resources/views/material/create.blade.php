@extends('layouts.app')
@section('title', 'Novo Material')
@section('content')
<h2>Novo Material</h2>
<form action="/materiais" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Agendamento</label>
        <select name="id_agendamento" class="form-select" required>
            <option value="">Selecione...</option>
            @foreach($agendamentos as $ag)
            <option value="{{ $ag->id_agendamento }}">#{{ $ag->id_agendamento }} - {{ $ag->data }} {{ $ag->horario }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label class="form-label">Nome do Arquivo</label><input type="text" name="nome_arquivo" class="form-control" value="{{ old('nome_arquivo') }}" required></div>
    <div class="mb-3"><label class="form-label">Tipo</label><input type="text" name="tipo" class="form-control" value="{{ old('tipo') }}" placeholder="pdf, imagem, doc..."></div>
    <div class="mb-3"><label class="form-label">Data de Recebimento</label><input type="date" name="data_recebimento" class="form-control" value="{{ old('data_recebimento') }}"></div>
    <button class="btn btn-success">Salvar</button>
    <a href="/materiais" class="btn btn-secondary">Cancelar</a>
</form>
@endsection