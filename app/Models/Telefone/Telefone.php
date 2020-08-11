<?php

namespace App\Models\Telefone;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends BaseModel
{
    protected $table = 'telefones';
    use SoftDeletes;
}
