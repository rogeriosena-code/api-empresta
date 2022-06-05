<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Convenio as ConvenioResource;
use Illuminate\Http\Request;
use App\Model\Convenio;

class ConvenioController extends Controller{

    public function findAll(){
        
        // LISTA OS CONVÊNIOS.
        $convenios = Convenio::findConvenios();
        return ConvenioResource::collection($convenios);
    }
}
