<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamento';

    public $incrementing = true;

    protected $fillable = [
        'id_aluno',
        'id_servico',
        'id_instituicao',
        'id_pagamento',
        'data',
        'horario',
        'status',
    ];

    
}
