<?php

namespace App\Models\Endereco;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends BaseModel
{
    protected $table = 'enderecos';
    use SoftDeletes;
}
