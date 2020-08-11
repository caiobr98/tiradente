<?php

namespace App\Models\Aluno;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultaPagamento extends BaseModel
{
    protected $table = 'pagamento_consulta_aluno';
    use SoftDeletes;  

    public function aluno()
    {
        return $this->hasOne('App\Models\Aluno\Aluno', 'id', 'aluno_id');
    }
}
