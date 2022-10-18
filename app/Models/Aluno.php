<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $casts = [
        'movies' => 'array'
    ];

    protected $guarded = [];

    public function materias() {
        return $this->belongsToMany(Materia::class);
    }
}
