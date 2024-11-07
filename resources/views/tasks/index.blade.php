<!-- resources/views/tasks/index.blade.php -->

<h1>Lista de Tarefas</h1>

<!-- Verificar se há uma mensagem de sucesso na sessão -->
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<!-- Exibir erros globais (se houver) -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a href="{{ route('tasks.create') }}">Criar Nova Tarefa</a>

<ul>
    @foreach($tasks as $task)
        <li>
            {{ $task->title }}
            <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja deletar esta tarefa?')">Deletar</button>
            </form>
        </li>
    @endforeach
</ul>