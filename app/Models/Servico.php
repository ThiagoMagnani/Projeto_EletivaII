<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servico';
    protected $primaryKey = 'id_servico';
    protected $fillable = ['nome_servico', 'valor_base', 'descricao'];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_servico', 'id_servico');
    }
}
