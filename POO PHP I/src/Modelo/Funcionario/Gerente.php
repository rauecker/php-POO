<?php

namespace Rauecker\Banco\Modelo\Funcionario;

use Rauecker\Banco\Modelo\Autenticavel;

class Gerente extends Funcionario implements Autenticavel{

   public function calculaBonificacao():float{

       return $this->recuperaSalario() * 1;    
   } 

   public function podeAutenticar(string $senha): bool{

      return $senha === "4321";
   }
}
