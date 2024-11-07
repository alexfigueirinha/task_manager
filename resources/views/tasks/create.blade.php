<!-- resources/views/tasks/create.blade.php -->
<h1>Criar Nova Tarefa</h1>

<!-- Exibir erros globais (como erros de banco de dados) -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Título:</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}">
    @if ($errors->has('title'))
        <div style="color: red;">{{ $errors->first('title') }}</div>
    @endif
    <br>

    <label for="description">Descrição:</label>
    <textarea name="description" id="description">{{ old('description') }}</textarea>
    @if ($errors->has('description'))
        <div style="color: red;">{{ $errors->first('description') }}</div>
    @endif
    <br>

    <button type="submit">Salvar</button>
</form>
