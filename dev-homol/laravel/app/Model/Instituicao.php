<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model{

	static function findInstituicoes(){
		
		$instituicoes = file_get_contents('http://localhost/dev-homol/laravel/app/Http/Repos/instituicoes.json');
    	return json_decode($instituicoes);
	}
}
