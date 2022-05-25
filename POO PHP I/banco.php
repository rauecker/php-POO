<?php

require_once "autoload.php";

use Rauecker\Banco\Modelo\AcessoPropriedades;
use Rauecker\Banco\Modelo\Conta\Titular;
use Rauecker\Banco\Modelo\Conta\Conta;
use Rauecker\Banco\Modelo\Conta\ContaPoupanca;
use Rauecker\Banco\Modelo\Conta\ContaCorrente;
use Rauecker\Banco\Service\ControladorDeBonificacoes;
use Rauecker\Banco\Service\Autenticador;
use Rauecker\Banco\Modelo\CPF;
use Rauecker\Banco\Modelo\Endereco;
use Rauecker\Banco\Modelo\Funcionario\Funcionario;
use Rauecker\Banco\Modelo\Funcionario\Gerente;
use Rauecker\Banco\Modelo\Funcionario\Diretor;
use Rauecker\Banco\Modelo\Funcionario\Desenvolvedor;
use Rauecker\Banco\Modelo\Pessoa;
use Rauecker\Banco\Modelo\Conta\SaldoInsuficienteException;

$endereco1 = new Endereco("Itapevi", "Itaparica", "Amarela", "273"); 

$endereco2 = new Endereco("Osasco", "Roxedale", "Atlântida", "99");

$primeiraConta = new ContaCorrente(new Titular(new CPF("123.456.789-10"), "Victor Rauecker", $endereco1));
$segundaConta = new ContaCorrente(new Titular(new CPF("987.644.321-10"), "Diego Rauecker", $endereco1));

$primeiraConta->deposita(500);
$segundaConta->deposita(100);

$primeiraConta->transfere(200, $segundaConta);

try{
    $primeiraConta->saca(5000);
} catch (SaldoInsuficienteException $exception){
    echo "Você não tem saldo para realizar esse saque\n";
    echo $exception->getMessage() . "\n";
}

try{
    $segundaConta->deposita(-200);
}catch(InvalidArgumentException $exception){
    echo "Valor a depositar precisa ser positivo\n";
}

echo var_dump($primeiraConta);
echo "\n";
echo var_dump($segundaConta);
echo "\n";

$gerente = new Gerente("Raul Rauecker",new CPF("456.789.123-10"), 5000);

$diretor = new Diretor("Rafael Rauecker",new CPF("159.779.123-10"), 10000);

$desenvolvedor = new Desenvolvedor("Zezinho",new CPF("184.779.123-10"), 1000);

$desenvolvedor->sobeDeNivel();

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($gerente);
$controlador->adicionaBonificacaoDe($desenvolvedor);
$controlador->adicionaBonificacaoDe($diretor);

echo "Total de bonificações é de ".$controlador->recuperaTotalDeBonificacao();

echo "\n";

$autententicador = new Autenticador();

$autententicador->tentaLogin($diretor, "1234");




