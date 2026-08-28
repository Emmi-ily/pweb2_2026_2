<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluno extends Model
{
    use Hasfactory;
    
    protected $fillable = [
        'nome',
        'telefone',
        'cpf',
        'categoria_id',
    ];

    //relacionamento de 1:1
    protected $cast = ['categoria_id' => 'integer']; //para converter (o campo vai ser um campo inteiro)

    public function categoria()
    {
        return $this->belongsTo(CategoriaAluno::class, 'categoria_id');
    }
}
