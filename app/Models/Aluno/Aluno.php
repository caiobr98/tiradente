<?php

namespace App\Models\Aluno;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends BaseModel
{
    protected $table = 'alunos';
    use SoftDeletes;  

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function endereco()
    {
        return $this->hasOne('App\Models\Endereco\Endereco', 'id', 'endereco_id');
    }
    
    public function telefone()
    {
        return $this->hasOne('App\Models\Telefone\Telefone', 'id', 'telefone_id');
    }

    public function escola()
    {
        return $this->hasOne('App\Models\Escola\Escola', 'id', 'escola_id');
    }
    
    public function serie()
    {
        return $this->hasOne('App\Models\Serie\Serie', 'id', 'serie_id');
    }

    public function pagamento()
    {
        return $this->hasOne('App\Models\Aluno\ConsultaPagamento', 'id', 'pagamento_id');
    }
}
