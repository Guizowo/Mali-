<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('data_inicio')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_tarefa'     => 'required|string|max:255',
            'descricao_tarefa'=> 'nullable|string',
            'data_inicio'     => 'nullable|date',
            'horario_tarefa'  => 'nullable|date_format:H:i',
            'tipo_tarefa'     => 'required|string|max:255',
            'local_tarefa'    => 'nullable|string|max:255',
        ], [
            'nome_tarefa.required'  => 'O título é obrigatório.',
            'tipo_tarefa.required'  => 'O tipo é obrigatório.',
            'horario_tarefa.date_format' => 'Horário inválido.',
        ]);

        Task::create([
            'nome_tarefa'      => $request->nome_tarefa,
            'descricao_tarefa' => $request->descricao_tarefa,
            'data_inicio'      => $request->data_inicio,
            'horario_tarefa'   => $request->horario_tarefa,
            'tipo_tarefa'      => $request->tipo_tarefa,
            'local_tarefa'     => $request->local_tarefa,
            'concluida'        => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!'); // corrigido: era 'sucess'
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'nome_tarefa'      => 'required|string|max:255',
            'descricao_tarefa' => 'nullable|string',
            'data_inicio'      => 'nullable|date',
            'horario_tarefa'   => 'nullable|date_format:H:i',
            'tipo_tarefa'      => 'nullable|string|max:255',
            'local_tarefa'     => 'nullable|string|max:255',
        ], [
            'nome_tarefa.required'       => 'O título é obrigatório.',
            'horario_tarefa.date_format' => 'Horário inválido.',
        ]);

        $task->update([
            'nome_tarefa'      => $request->nome_tarefa,
            'descricao_tarefa' => $request->descricao_tarefa,
            'data_inicio'      => $request->data_inicio,
            'horario_tarefa'   => $request->horario_tarefa,
            'tipo_tarefa'      => $request->tipo_tarefa,
            'local_tarefa'     => $request->local_tarefa,
            'concluida'        => $request->boolean('concluida'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
