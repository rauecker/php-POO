<?php

namespace Rauecker\Banco\Service;

use Rauecker\Banco\Modelo\Autenticavel;

class Autenticador{

    public function tentaLogin(Autenticavel $autenticavel, string $senha): void{

        if($autenticavel->podeAutenticar($senha)) {
            echo "Ok. Usuário logado no sistema";
        }else{
            echo "Senha incorreta";
        }
    }
}