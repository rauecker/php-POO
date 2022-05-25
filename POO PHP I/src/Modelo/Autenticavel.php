<?php

namespace Rauecker\Banco\Modelo;

interface Autenticavel{

    public function podeAutenticar(string $senha): bool;

}

