<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; // Importando para capturar erros de banco

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            $task = new Task();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->save();

            // Definir uma mensagem de sucesso
            return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
        } catch (QueryException $e) {
            // Captura erros de banco de dados e retorna para a página de criação com a mensagem de erro
            return redirect()->route('tasks.create')->withErrors('Erro ao salvar a tarefa: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(StoreTaskRequest $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->title = $request->title;
            $task->description = $request->description;
            $task->save();

            // Definir uma mensagem de sucesso
            return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
        } catch (QueryException $e) {
            // Captura erros de banco de dados e retorna para a página de edição com a mensagem de erro
            return redirect()->route('tasks.edit', $id)->withErrors('Erro ao atualizar a tarefa: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return redirect()->route('tasks.index');
        } catch (QueryException $e) {
            // Captura erros de banco de dados e exibe mensagem de erro
            return redirect()->route('tasks.index')->withErrors('Erro ao excluir a tarefa: ' . $e->getMessage());
        }
    }
}