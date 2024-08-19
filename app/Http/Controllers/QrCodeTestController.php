<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeTestController extends Controller
{
    public function generate()
    {
        $qrCode = QrCode::size(250)->generate('https://fatecitapetininga.edu.br/academico/horario/');

        return view('qrcodes.test', ['qrCode' => $qrCode]);
    }
}
