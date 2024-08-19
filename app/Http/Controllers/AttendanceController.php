<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:classes,id',
        ]);

        $attendance = new Attendance();
        $attendance->class_id = $validated['class_id'];
        $attendance->student_id = auth()->id();
        $attendance->save();

        return back()->with('status', 'Presença registrada com sucesso!');
    }
}
