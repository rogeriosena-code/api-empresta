<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Instituicao extends JsonResource
{

    public function toArray($request)
    {
        return [            
            'chave' => $this->chave,
            'valor' => $this->valor
        ];
    }
}
