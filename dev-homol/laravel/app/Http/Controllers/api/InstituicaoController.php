<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Instituicao as InstituicaoResource;
use Illuminate\Http\Request;
use App\Model\Instituicao as Instituicao;

class InstituicaoController extends Controller{

    public function findAll(){
        
        // LISTA AS INSTITUIÇÕES.
        $instituicoes = Instituicao::findInstituicoes();
        return InstituicaoResource::collection($instituicoes);
    }
}
