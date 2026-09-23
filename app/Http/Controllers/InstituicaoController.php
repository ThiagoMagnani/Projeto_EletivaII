<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index()
    {
        return view('instituicao.index', ['instituicoes' => Instituicao::all()]);
    }

    public function create()
    {
        return view('instituicao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'endereco' => 'nullable|string|max:255',
            'contato' => 'nullable|string|max:50',
        ]);

        $instituicao = Instituicao::create($request->all());

        if ($request->expectsJson()) {
            return response()->json([
                'id' => $instituicao->id_instituicao,
                'nome' => $instituicao->nome
            ]);
        }

        return redirect()
            ->route('instituicoes.index')
            ->with('mensagem', 'Instituição cadastrada com sucesso!');
    }

    public function edit(string $id)
    {
        return view('instituicao.edit', ['instituicao' => Instituicao::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'endereco' => 'nullable|string|max:255',
            'contato' => 'nullable|string|max:50',
        ]);

        Instituicao::findOrFail($id)->update($request->all());
        return redirect()->route('instituicoes.index')->with('mensagem', 'Instituição atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        Instituicao::findOrFail($id)->delete();
        return redirect()->route('instituicoes.index')->with('mensagem', 'Instituição excluída!');
    }
}
