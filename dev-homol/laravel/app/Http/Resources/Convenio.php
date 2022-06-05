<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Convenio extends JsonResource{

    public function toArray($request){

        return [            
            'chave' => $this->chave,
            'valor' => $this->valor
        ];
    }
}
