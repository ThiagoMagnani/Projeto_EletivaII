@extends('layouts.app')
@section('title', 'Detalhes do Agendamento')
@section('content')
<h2>Agendamento #{{ $agendamento->id_agendamento }}</h2>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Aluno:</strong> {{ $agendamento->aluno->nome ?? '—' }}</li>
    <li class="list-group-item"><strong>Serviço:</strong> {{ $agendamento->servico->nome_servico ?? '—' }}</li>
    <li class="list-group-item"><strong>Instituição:</strong> {{ $agendamento->instituicao->nome ?? '—' }}</li>
    <li class="list-group-item"><strong>Pagamento:</strong> {{ $agendamento->pagamento->forma_pagamento ?? '—' }}</li>
    <li class="list-group-item"><strong>Data:</strong> {{ $agendamento->data }}</li>
    <li class="list-group-item"><strong>Horário:</strong> {{ $agendamento->horario }}</li>
    <li class="list-group-item"><strong>Status:</strong> {{ $agendamento->status }}</li>
</ul>

<h4>Materiais</h4>
<ul class="list-group mb-3">
    @forelse($agendamento->materiais as $m)
    <li class="list-group-item">{{ $m->nome_arquivo }} ({{ $m->tipo }})</li>
    @empty
    <li class="list-group-item">Nenhum material enviado.</li>
    @endforelse
</ul>

<a href="/agendamentos" class="btn btn-secondary">Voltar</a>
@endsection