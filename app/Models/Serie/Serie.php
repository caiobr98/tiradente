<?php

namespace App\Models\Aluno;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends BaseModel
{
    protected $table = 'serie';
    use SoftDeletes;  
}
