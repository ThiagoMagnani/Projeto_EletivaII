<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';
    protected $primaryKey = 'id_aluno';
    protected $fillable = ['nome', 'cpf', 'email', 'telefone'];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_aluno', 'id_aluno');
    }
}
