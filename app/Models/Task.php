<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    // Defina os campos que podem ser atribuídos em massa
    protected $fillable = ['titulo', 'descricao', 'status', 'data_conclusao', 'hora_conclusao', 'prioridade', 'user_id'];

    // Relação belongsTo com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
