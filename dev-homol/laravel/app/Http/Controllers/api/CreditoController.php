<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Credito as CreditoResource;
use App\Http\Requests\StoreCreditoRequest as StoreCreditoRequest;
use Illuminate\Http\Request;
use App\Model\Credito as Credito;

class CreditoController extends Controller{

    public function findSimulacoes(StoreCreditoRequest $request){

        $credito  = $this->validarParamsEntrada($request);

        // BUSCA O JSON CORRESPONDENTE DO CREDITO.
        $simulacaoCredito = Credito::findSimulacaoCredito();

        // RETORNA AS SIMULAÇÕES DISPONÍVEIS DE ACORDO COM O REQUEST.
        $response = $this->retornarSimulacoesDisponiveis($credito);        

        return json_encode($response);
    }

    private function validarParamsEntrada(Request $request){

        $credito  = new Credito;
        $credito->valor_emprestimo = $request->input('valor_emprestimo');
        $credito->instituicoes     = !empty($request->input('instituicoes')) ? $request->input('instituicoes') : array();
        $credito->convenios        = !empty($request->input('convenios')) ? $request->input('convenios') : array();
        $credito->parcela          = !empty($request->input('parcela')) ? $request->input('parcela') : null;
        
        return $credito;
    }

    private function retornarSimulacoesDisponiveis(Credito $credito){

        $response = array();        

        // BUSCA O JSON CORRESPONDENTE DO CREDITO.
        $simulacaoCredito = Credito::findSimulacaoCredito();

        if(!empty($simulacaoCredito)){

            foreach($simulacaoCredito as $key => $params){
                
                if(
                    (in_array($params->instituicao, $credito->instituicoes) || empty($credito->instituicoes) )
                        &&
                    (in_array($params->convenio, $credito->convenios) || empty($credito->convenios) )
                        &&
                    ($credito->parcela === $params->parcelas || empty($credito->parcela) )
                ){

                    $valorParcela = number_format($credito->valor_emprestimo * $params->coeficiente, 2);
                    $response[$params->instituicao][] = 
                    (object) array(
                        'taxa' => $params->taxaJuros,
                        'parcelas' => $params->parcelas,
                        'valor_parcela' =>  $valorParcela,
                        'convenio' => $params->convenio,
                        'valor_emprestimo' => $credito->valor_emprestimo,
                        'valor_final_pago' => $valorParcela * $params->parcelas
                    );
                }
            }
        }

        return $response;
    }
}