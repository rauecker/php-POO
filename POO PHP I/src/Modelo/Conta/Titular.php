<?php

namespace Rauecker\Banco\Modelo\Conta;

use Rauecker\Banco\Modelo\Pessoa;
use Rauecker\Banco\Modelo\CPF;
use Rauecker\Banco\Modelo\Endereco;
use Rauecker\Banco\Modelo\Autenticavel;

class Titular extends Pessoa implements Autenticavel{

    private $endereco;

    public function __construct(CPF $cpf, string $nome, Endereco $endereco){
 
       parent::__construct($nome, $cpf); 
       $this->endereco = $endereco;
    }

    public function recuperaEndereco(): string{

        return $this->endereco;
    }

    public function podeAutenticar(string $senha): bool{

        return $senha === "abcd";
    }
}