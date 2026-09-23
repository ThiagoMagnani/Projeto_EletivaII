<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicao';
    protected $primaryKey = 'id_instituicao';
    protected $fillable = ['nome', 'endereco', 'contato'];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_instituicao', 'id_instituicao');
    }
}
