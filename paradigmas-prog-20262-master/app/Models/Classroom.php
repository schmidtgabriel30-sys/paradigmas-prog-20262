<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name',
        'vacancies',
        'course_id' // Adicionado para permitir o relacionamento 1-N com o curso
    ];

    // Relação 1-N: Uma turma pertence a um curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relação N-M: Uma turma possui muitos usuários (matrículas)
    public function users()
    {
        return $this->belongsToMany(User::class, 'classroom_user');
    }
}