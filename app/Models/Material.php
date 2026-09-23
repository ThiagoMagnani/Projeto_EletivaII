<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $primaryKey = 'id_material';
    protected $fillable = ['id_agendamento', 'nome_arquivo', 'tipo', 'data_recebimento'];

    public function agendamento()
    {
        return $this->belongsTo(Agendamento::class, 'id_agendamento', 'id_agendamento');
    }
}
