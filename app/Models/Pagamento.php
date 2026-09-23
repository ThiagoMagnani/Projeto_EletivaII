<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamento';
    protected $primaryKey = 'id_pagamento';
    protected $fillable = ['valor', 'data_pagamento', 'forma_pagamento'];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_pagamento', 'id_pagamento');
    }
}
