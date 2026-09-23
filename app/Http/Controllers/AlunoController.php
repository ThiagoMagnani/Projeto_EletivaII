<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return view('aluno.index', ['alunos' => Aluno::all()]);
    }

    public function create()
    {
        return view('aluno.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|max:14|unique:aluno,cpf',
            'email' => 'nullable|email|max:100',
            'telefone' => 'nullable|string|max:20',
        ]);

        $aluno = Aluno::create($request->all());

        if ($request->expectsJson()) {
            return response()->json([
                'id' => $aluno->id_aluno,
                'nome' => $aluno->nome
            ]);
        }

        return redirect()
            ->route('alunos.index')
            ->with('mensagem', 'Aluno cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        return view('aluno.edit', ['aluno' => Aluno::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|max:14|unique:aluno,cpf,' . $aluno->id_aluno . ',id_aluno',
            'email' => 'nullable|email|max:100',
            'telefone' => 'nullable|string|max:20',
        ]);

        $aluno->update($request->all());
        return redirect()->route('alunos.index')->with('mensagem', 'Aluno atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        Aluno::findOrFail($id)->delete();
        return redirect()->route('alunos.index')->with('mensagem', 'Aluno excluído!');
    }
}
