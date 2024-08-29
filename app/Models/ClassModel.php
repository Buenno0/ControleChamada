<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    // Defina o nome da tabela explicitamente, se necessário
    protected $table = 'classes';

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'teacher_id',
        'qr_code_path',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
