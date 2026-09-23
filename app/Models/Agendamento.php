<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamento';
    protected $primaryKey = 'id_agendamento';
    protected $fillable = ['id_aluno', 'id_servico', 'id_instituicao', 'id_pagamento', 'data', 'horario', 'status'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno', 'id_aluno');
    }
    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico', 'id_servico');
    }
    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao', 'id_instituicao');
    }
    public function pagamento()
    {
        return $this->belongsTo(Pagamento::class, 'id_pagamento', 'id_pagamento');
    }
    public function materiais()
    {
        return $this->hasMany(Material::class, 'id_agendamento', 'id_agendamento');
    }
}
