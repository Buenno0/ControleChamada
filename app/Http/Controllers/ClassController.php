<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::with('teacher')->get();
        return view('classes.index', compact('classes'));
    }

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
        $class->teacher_id = auth()->id();
        $class->save();

        return redirect()->route('classes.index');
    }

    public function show(ClassModel $class)
    {
        return view('classes.show', compact('class'));
    }
}
