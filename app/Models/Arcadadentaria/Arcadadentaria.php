<?php

namespace App\Models\Arcadadentaria;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arcadadentaria extends BaseModel
{
    protected $table = 'arcadadentarias';
    use SoftDeletes;  
}
