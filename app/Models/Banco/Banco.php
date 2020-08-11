<?php

namespace App\Models\Banco;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banco extends BaseModel
{
    protected $table = 'bancos';
    use SoftDeletes;
    
    // public function colaborador()
    // {
    //     return $this->hasOne('App\User', 'id', 'user_id');
    // }
}
