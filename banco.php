<?php

require_once 'Conta.php';

$conta1 = new Conta('123.456.789-10', 'James');
$conta1->depositar(500);
$conta1->sacar(300);

echo "Nome do Titular da conta: ".$conta1->getNome().'<br>';
echo "CPF do Titular da conta: ".$conta1->getCpf().'<br>';
echo "Saldo disponível: ".$conta1->getSaldo();
echo '<hr>';

$conta2 = new Conta('123.456.889-20', 'Richard');
$conta2->depositar(500);
$conta2->sacar(200);

echo "Nome do Titular da conta: ". $conta2->getNome().'<br>';
echo "CPF do Titular da conta: ". $conta2->getCpf().'<br>';
echo "Saldo disponível: ". $conta2->getSaldo();
echo '<hr>';


echo "Número de Contas: ". Conta::recuperaNumeroDeContas();