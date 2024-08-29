<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
{
    try {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Criação e salvamento do modelo
        $class = new ClassModel();
        $class->fill($request->all());
        $class->teacher_id = Auth::id();
        $class->save();

        // Geração do QR Code
        $qrCode = QrCode::size(500)->generate(route('classes.show', ['class' => $class->id]));

        // Caminho para salvar o QR Code
        $qrCodeDir = public_path('qrcodes');

        // Verifique se a pasta existe e crie se necessário
        if (!File::exists($qrCodeDir)) {
            File::makeDirectory($qrCodeDir, 0755, true);
        }

        // Caminho completo do arquivo QR Code
        $filePath = $qrCodeDir . '/' . $class->id . '.svg';

        // Salve o QR Code
        File::put($filePath, $qrCode);

        // Atualize o caminho do QR Code no banco de dados
        $class->qr_code_path = 'qrcodes/' . $class->id . '.svg';
        $class->save();

        // Redirecione para a página de detalhes da aula
        return redirect()->route('classes.show', ['class' => $class->id])->with('status', 'Aula criada com sucesso!');
    } catch (\Exception $e) {
        // Exibe a mensagem de erro
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}



    public function show(ClassModel $class)
    {
        return view('classes.show', compact('class'));
    }
}
