<!-- resources/views/tasks/create.blade.php -->
<h1>Criar Nova Tarefa</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Título:</label>
    <input type="text" name="title" id="title">
    <br>
    <label for="description">Descrição:</label>
    <textarea name="description" id="description"></textarea>
    <br>
    <button type="submit">Salvar</button>
</form>
