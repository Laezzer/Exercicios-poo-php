<?php
// Exercício 2 — Funcionários

class Funcionario
{
    protected string $nome;
    protected string $cpf;
    protected float $salario;

    public function __construct(string $nome, string $cpf, float $salario)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function exibirFuncionario(): string
    {
        return "Nome: {$this->nome} | CPF: {$this->cpf} | Salário: R$ "
            . number_format($this->salario, 2, ',', '.');
    }
}

class Gerente extends Funcionario
{
    private string $setor;

    public function __construct(string $nome, string $cpf, float $salario, string $setor)
    {
        parent::__construct($nome, $cpf, $salario);
        $this->setor = $setor;
    }

    public function realizarReuniao(): string
    {
        return "{$this->nome} está realizando uma reunião no setor {$this->setor}.";
    }
}

class Desenvolvedor extends Funcionario
{
    private string $linguagem;

    public function __construct(string $nome, string $cpf, float $salario, string $linguagem)
    {
        parent::__construct($nome, $cpf, $salario);
        $this->linguagem = $linguagem;
    }

    public function programar(): string
    {
        return "{$this->nome} está programando em {$this->linguagem}.";
    }
}

$gerente = new Gerente("Ana Souza", "111.111.111-11", 9000, "Tecnologia");
$dev = new Desenvolvedor("Carlos Lima", "222.222.222-22", 6500, "PHP");

echo "<pre>";
echo "--- Métodos herdados ---" . PHP_EOL;
echo $gerente->exibirFuncionario() . PHP_EOL;
echo $dev->exibirFuncionario() . PHP_EOL;

echo PHP_EOL . "--- Métodos específicos ---" . PHP_EOL;
echo $gerente->realizarReuniao() . PHP_EOL;
echo $dev->programar() . PHP_EOL;

echo PHP_EOL . "--- Gerente chamando programar() ---" . PHP_EOL;
try {
    echo $gerente->programar();
} catch (Error $e) {
    echo "Erro capturado: " . $e->getMessage() . PHP_EOL;
}
/*
 * Explicação: programar() foi declarado apenas em Desenvolvedor. Gerente herda
 * de Funcionario, que não possui esse método, então o PHP lança
 * "Call to undefined method Gerente::programar()". O conhecimento flui da
 * superclasse para a subclasse, nunca entre classes irmãs.
 */
echo "</pre>";
