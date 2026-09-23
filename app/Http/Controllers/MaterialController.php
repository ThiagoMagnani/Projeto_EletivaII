<?php
namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return view('material.index', ['materiais' => Material::with('agendamento')->get()]);
    }

    public function create()
    {
        return view('material.create', ['agendamentos' => Agendamento::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_agendamento' => 'required|exists:agendamento,id_agendamento',
            'nome_arquivo' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:50',
            'data_recebimento' => 'nullable|date',
        ]);

        Material::create($request->all());
        return redirect()->route('materiais.index')->with('mensagem', 'Material cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        return view('material.edit', [
            'material' => Material::findOrFail($id),
            'agendamentos' => Agendamento::all(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_agendamento' => 'required|exists:agendamento,id_agendamento',
            'nome_arquivo' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:50',
            'data_recebimento' => 'nullable|date',
        ]);

        Material::findOrFail($id)->update($request->all());
        return redirect()->route('materiais.index')->with('mensagem', 'Material atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        Material::findOrFail($id)->delete();
        return redirect()->route('materiais.index')->with('mensagem', 'Material excluído!');
    }
}