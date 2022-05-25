<?php

namespace Rauecker\Banco\Modelo\Funcionario;

use Rauecker\Banco\Modelo\CPF;
use Rauecker\Banco\Modelo\Pessoa;


abstract class Funcionario extends Pessoa{

    private float $salario;

    public function __construct(string $nome, CPF $cpf, float $salario){

        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function recuperaSalario():float{

        return $this->salario;
    }

    public function alteraNome($nome): void{

        $this->validaNome($nome);
        $this->nome = $nome;
    }

    public function recebeAumento($valorAumento): void{

        if($valorAumento < 0){
            echo "Aumento deve ser positivo";
            return;
        }

        $this->salario += $valorAumento;
    }

    abstract public function calculaBonificacao(): float;  

}
