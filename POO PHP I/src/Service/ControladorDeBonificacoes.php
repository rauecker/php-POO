<?php

namespace Rauecker\Banco\Service;

use Rauecker\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes{

    private float $totalBonificacoes = 0;

    public function adicionaBonificacaoDe(Funcionario $funcionario){

        $this->totalBonificacoes += $funcionario->calculaBonificacao();
    }

    public function recuperaTotaldeBonificacao():float{

        return $this->totalBonificacoes;
    }
}