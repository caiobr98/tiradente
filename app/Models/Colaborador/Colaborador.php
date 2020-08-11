<?php

namespace App\Models\Colaborador;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colaborador extends BaseModel
{
    protected $table = 'colaboradores';
    use SoftDeletes;
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function banco()
    {
        return $this->hasOne('App\Models\Banco\Banco', 'id', 'banco_id');
    }
}
