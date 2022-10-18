<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function professor(){
        return $this->belongsTo('App\Models\Professor');
    }

    public function alunos() {
        return $this->belongsToMany(Aluno::class);
    }
}
