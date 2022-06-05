<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model{

	protected $fillable = ['valor_emprestimo'];

    static function findSimulacaoCredito(){

    	$fileRead = file_get_contents('http://localhost/dev-homol/laravel/app/Http/Repos/taxas_instituicoes.json');
    	return json_decode($fileRead);
    }
}
