<?php

namespace App\Models;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}

