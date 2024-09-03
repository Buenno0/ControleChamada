<form action="{{ route('classes.store') }}" method="POST">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

    <label for="description">Descrição:</label>
    <textarea id="description" name="description">{{ old('description') }}</textarea>

    <label for="start_time">Hora de Início:</label>
    <input type="datetime-local" id="start_time" name="start_time" value="{{ old('start_time') }}" required>

    <label for="end_time">Hora de Término:</label>
    <input type="datetime-local" id="end_time" name="end_time" value="{{ old('end_time') }}" required>

    <button type="submit">Criar Aula</button>
</form>
@isset($qrCodePath)
        <div class="mt-4">
            <h2>QR Code Gerado:</h2>
            <div class="text-center">
                <img src="{{ asset($qrCodePath) }}" alt="QR Code da Aula">
            </div>
        </div>
    @endisset