<?php

namespace App\Models\Coordenador;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordenador extends BaseModel
{
    protected $table = 'coordenadores';
    use SoftDeletes;

    public function colaborador()
    {
        return $this->hasOne('App\Models\Colaborador\Colaborador', 'id', 'colaborador_id');
    }
}
