<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>
<body>
    @if (session('qrCodePath'))
        <img src="{{ asset(session('qrCodePath')) }}" alt="QR Code">
    @else
        <p>Nenhum QR Code disponível.</p>
    @endif  
</body>
</html>
