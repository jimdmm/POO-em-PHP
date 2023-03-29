<?php

class Conta
{
    private $cpfTitular;
    private $nomeTitular;
    private $saldo = 0;
    private static $numeroDeContas = 0;

    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this->nomeTitular = $nomeTitular;
        $this->cpfTitular = $cpfTitular;
        $this->saldo = 0;
        $this->validaNome($nomeTitular);

        self::$numeroDeContas++;
    }

    public function sacar(float $valorASacar) : void
    {
        if($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        } 
            $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar) : void
    {
        if($valorADepositar < 0) {
            echo "Você precisa adicionar um valor acima de 0";
            return;
        }
            $this->saldo += $valorADepositar;
    }

    public function transferir(float $valorATransfeir, Conta $contaDestino): void
    {
        if($valorATransfeir > $this->saldo) {
            echo "Saldo Indisponível";
            return;
        }
            $this->sacar($valorATransfeir);
            $contaDestino->depositar($valorATransfeir);
    }

    public function getNome(): string
    {
        return $this->nomeTitular;
    }

    public function getCpf(): string
    {
        return $this->cpfTitular;
    }
    
    public function getSaldo(): float
    {
        return $this->saldo;
    }

    private function validaNome(string $nomeTitular)
    {
        if(strlen($nomeTitular) < 5) {
            echo "Nome precisa ser maior que 5 caracteres.";
            exit();
        }
    }

    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }
}
