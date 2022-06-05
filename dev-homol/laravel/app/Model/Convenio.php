<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model{

	static function findConvenios(){
		
		$convenios = file_get_contents('http://localhost/dev-homol/laravel/app/Http/Repos/convenios.json');
    	return json_decode($convenios);
	}
}
