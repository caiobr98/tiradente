<?php

namespace App\Models\Escola;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Escola extends BaseModel
{
    protected $table = 'escolas';
    use SoftDeletes;
    
    public function endereco()
    {
        return $this->hasOne('App\Models\Endereco\Endereco', 'id', 'endereco_id');
    }
}
