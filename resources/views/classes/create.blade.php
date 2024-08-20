<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Aula</title>
</head>
<body>
    <h1>Criar Nova Aula</h1>
    
    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <label for="name">Nome da Aula:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Descrição:</label>
        <textarea id="description" name="description"></textarea>
        <br>
        <button type="submit">Criar Aula</button>
    </form>
</body>
</html>
