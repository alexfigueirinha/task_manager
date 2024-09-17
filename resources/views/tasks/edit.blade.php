<!-- resources/views/tasks/edit.blade.php -->
<h1>Editar Tarefa</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Título:</label>
    <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}">
    @if ($errors->has('title'))
        <div style="color: red;">{{ $errors->first('title') }}</div>
    @endif
    <br>
    <label for="description">Descrição:</label>
    <textarea name="description" id="description">{{ old('description', $task->description) }}"></textarea>
    <br>
    <button type="submit">Atualizar</button>
</form>
