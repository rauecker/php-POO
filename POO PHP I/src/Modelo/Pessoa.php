<?php

namespace Rauecker\Banco\Modelo;

abstract class Pessoa{

    use AcessoPropriedades;

    protected string $nome;
    private CPF $cpf;

    public function __construct(string $nome, CPF $cpf){

        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function recuperaNome(): string{

        return $this->nome;
    }

    public function recuperaCpf(): string{

        return $this->cpf->recuperaNumero();
    }

    final protected function validaNome(string $nome){

        if(strlen($nome)<5){
            throw new \LengthException("O nome precisa ter no mínimo 5 letras.");
        }
    } 
}

