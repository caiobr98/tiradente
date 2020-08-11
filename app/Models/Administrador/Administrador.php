<?php

namespace App\Models\Administrador;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrador extends BaseModel
{
    protected $table = 'administradores';
    use SoftDeletes;
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
