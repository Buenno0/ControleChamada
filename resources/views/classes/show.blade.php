
@section('content')
<div class="container">
    <h1>Detalhes da Aula</h1>
    
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <h2>{{ $class->name }}</h2>
            <p><strong>Descrição:</strong> {{ $class->description }}</p>
            <p><strong>Hora de Início:</strong> {{ $class->start_time }}</p>
            <p><strong>Hora de Término:</strong> {{ $class->end_time }}</p>
            <p><strong>Professor:</strong> {{ $class->teacher->name }}</p>
            
            <h3>QR Code:</h3>
            @if ($class->qr_code_path)
                <img src="{{ asset($class->qr_code_path) }}" alt="QR Code">
            @else
                <p>Nenhum QR Code disponível.</p>
            @endif
        </div>
    </div>
</div>
@endsection
