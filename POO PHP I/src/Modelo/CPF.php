<?php

namespace Rauecker\Banco\Modelo;

final class CPF
{
    private string $numero;

    public function __construct(string $numero)
    {
        $numero = filter_var($numero, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);
        if ($numero === false) {
            throw new \InvalidArgumentException("O CPF precisar conter 11 caracteres no formato (XXX.XXX.XXX-XX)");
        }
        $this->numero = $numero;
    }

    public function recuperaNumero(): string
    {
        return $this->numero;
    }
}