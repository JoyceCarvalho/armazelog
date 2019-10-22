<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas';
    protected $fillable = ['id', 'hora', 'data', 'mercadoria', 'peso', 'quantidade', 'nota_fiscal', 'conhecimento', 'veiculo_id', 'unidade_id'];

    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo');
    }
    public function unidade()
    {
    	return $this->belongsTo('App\Unidade');
    }
}