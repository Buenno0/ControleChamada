<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Aula</title>
</head>
<body>
    <h1>{{ $class->name }}</h1>
    <p>{{ $class->description }}</p>
    
    @if ($class->qr_code_path)
        <h2>QR Code</h2>
        <img src="{{ asset($class->qr_code_path) }}" alt="QR Code">
    @endif
</body>
</html>
