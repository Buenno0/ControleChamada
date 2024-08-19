<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ClassController extends Controller
{
    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $class = new ClassModel($validated);
        $class->teacher_id = Auth::id();
        $class->save();

        // Gerar o QR code
        $qrCode = QrCode::size(250)->generate(route('classes.show', ['class' => $class->id]));
        
        // Salvar o QR code em um diretório
        $path = public_path('qrcodes/' . $class->id . '.svg');
        file_put_contents($path, $qrCode);

        return redirect()->route('classes.index')->with('status', 'Aula criada com sucesso!');
    }

    public function show(ClassModel $class)
    {
        return view('classes.show', compact('class'));
    }
}
