<?php
// Exercício 5 — Contas bancárias

class ContaBancaria
{
    protected string $titular;
    protected float $saldo;

    public function __construct(string $titular, float $saldo = 0)
    {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function depositar(float $valor): bool
    {
        if ($valor <= 0) {
            return false;
        }
        $this->saldo += $valor;
        return true;
    }

    // Operação básica: não permite sacar mais do que o saldo disponível.
    public function sacar(float $valor): bool
    {
        if ($valor <= 0 || $valor > $this->saldo) {
            return false;
        }
        $this->saldo -= $valor;
        return true;
    }

    public function consultarSaldo(): float
    {
        return $this->saldo;
    }
}

class ContaCorrente extends ContaBancaria
{
    private float $limite;

    public function __construct(string $titular, float $saldo, float $limite)
    {
        parent::__construct($titular, $saldo);
        $this->limite = $limite;
    }

    // Saque que pode usar o limite do cheque especial.
    public function usarLimite(float $valor): bool
    {
        if ($valor <= 0 || $valor > $this->saldo + $this->limite) {
            return false;
        }
        $this->saldo -= $valor;
        return true;
    }
}

class ContaPoupanca extends ContaBancaria
{
    private float $taxaRendimento; // em %

    public function __construct(string $titular, float $saldo, float $taxaRendimento)
    {
        parent::__construct($titular, $saldo);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento(): void
    {
        $this->saldo += $this->saldo * ($this->taxaRendimento / 100);
    }
}

function brl(float $v): string
{
    return "R$ " . number_format($v, 2, ',', '.');
}

echo "<pre>";
$conta = new ContaBancaria("Fernanda", 1000.00);
echo "Saldo inicial: " . brl($conta->consultarSaldo()) . PHP_EOL;

$conta->depositar(500);
echo "Após depositar R$ 500,00: " . brl($conta->consultarSaldo()) . PHP_EOL;

$conta->sacar(200);
echo "Após sacar R$ 200,00: " . brl($conta->consultarSaldo()) . PHP_EOL . PHP_EOL;

echo "Tentando sacar R$ 2.000,00..." . PHP_EOL;
if ($conta->sacar(2000)) {
    echo "Saque realizado." . PHP_EOL;
} else {
    echo "Operação RECUSADA: saldo insuficiente." . PHP_EOL;
}
echo "Saldo final: " . brl($conta->consultarSaldo()) . PHP_EOL . PHP_EOL;

// Métodos específicos das subclasses
$cc = new ContaCorrente("Bruno", 100, 500);
echo "Conta corrente: usarLimite(400) => " . ($cc->usarLimite(400) ? "ok" : "recusado")
    . " | saldo: " . brl($cc->consultarSaldo()) . PHP_EOL;

$cp = new ContaPoupanca("Carla", 1000, 0.5);
$cp->aplicarRendimento();
echo "Poupança após rendimento de 0,5%: " . brl($cp->consultarSaldo()) . PHP_EOL;
echo "</pre>";
