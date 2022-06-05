<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Credito extends JsonResource
{

    public function toArray($request)
    {

        return 
        ['instituicao' => $this->instituicao,            
            array(
            	'taxa'    		=> $this->taxa,
	            'parcelas'      => $this->parcelas,
	            'valor_parcela' => $this->valor_parcela,
	            'convenio'      => $this->convenio
	        )
        ];
    }
}
