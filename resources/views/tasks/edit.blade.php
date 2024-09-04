<!-- resources/views/tasks/edit.blade.php -->
<h1>Editar Tarefa</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Título:</label>
    <input type="text" name="title" id="title" value="{{ $task->title }}">
    <br>
    <label for="description">Descrição:</label>
    <textarea name="description" id="description">{{ $task->description }}</textarea>
    <br>
    <button type="submit">Atualizar</button>
</form>
