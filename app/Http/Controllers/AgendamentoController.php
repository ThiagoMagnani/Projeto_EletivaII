<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Aluno;
use App\Models\Servico;
use App\Models\Instituicao;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamento = Agendamento::with(['aluno', 'servico', 'instituicao', 'pagamento'])->get();
        return view('agendamento.index', compact('agendamento'));
    }

    public function create()
    {
        return view('agendamento.create', [
            'alunos' => Aluno::all(),
            'servicos' => Servico::all(),
            'instituicoes' => Instituicao::all(),
            'pagamentos' => Pagamento::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_aluno' => 'required|exists:aluno,id_aluno',
            'id_servico' => 'required|exists:servico,id_servico',
            'id_instituicao' => 'required|exists:instituicao,id_instituicao',
            'id_pagamento' => 'nullable|exists:pagamento,id_pagamento',
            'data' => 'required|date',
            'horario' => 'required',
            'status' => 'required|string|max:50',
        ]);

        Agendamento::create($request->all());
        return redirect()->route('agendamentos.index')->with('mensagem', 'Agendamento inserido com sucesso!');
    }

    public function show(string $id)
    {
        $agendamento = Agendamento::with(['aluno', 'servico', 'instituicao', 'pagamento', 'materiais'])->findOrFail($id);
        return view('agendamento.show', compact('agendamento'));
    }

    public function edit(string $id)
    {
        return view('agendamento.edit', [
            'agendamento' => Agendamento::findOrFail($id),
            'alunos' => Aluno::all(),
            'servicos' => Servico::all(),
            'instituicoes' => Instituicao::all(),
            'pagamentos' => Pagamento::all(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_aluno' => 'required|exists:aluno,id_aluno',
            'id_servico' => 'required|exists:servico,id_servico',
            'id_instituicao' => 'required|exists:instituicao,id_instituicao',
            'id_pagamento' => 'nullable|exists:pagamento,id_pagamento',
            'data' => 'required|date',
            'horario' => 'required',
            'status' => 'required|string|max:50',
        ]);

        Agendamento::findOrFail($id)->update($request->all());
        return redirect()->route('agendamentos.index')->with('mensagem', 'Agendamento alterado com sucesso!');
    }

    public function destroy(string $id)
    {
        Agendamento::findOrFail($id)->delete();
        return redirect()->route('agendamentos.index')->with('mensagem', 'Agendamento excluído!');
    }
}
