<?php
// Exercício 6 — Três níveis de classes
// Hierarquia: Pessoa <- Funcionario <- Programador / Designer

class Pessoa
{
    protected string $nome;
    protected string $email;

    public function __construct(string $nome, string $email)
    {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function apresentar(): string // declarado em Pessoa
    {
        return "Olá, sou {$this->nome} ({$this->email}).";
    }
}

class Funcionario extends Pessoa
{
    protected float $salario;
    protected string $matricula;

    public function __construct(string $nome, string $email, float $salario, string $matricula)
    {
        parent::__construct($nome, $email);
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    public function trabalhar(): string // declarado em Funcionario
    {
        return "{$this->nome} (matrícula {$this->matricula}) está trabalhando.";
    }
}

class Programador extends Funcionario
{
    private string $linguagemPrincipal;

    public function __construct(string $nome, string $email, float $salario, string $matricula, string $linguagemPrincipal)
    {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    public function programar(): string // declarado em Programador
    {
        return "{$this->nome} está programando em {$this->linguagemPrincipal}.";
    }
}

class Designer extends Funcionario
{
    private string $ferramentaPrincipal;

    public function __construct(string $nome, string $email, float $salario, string $matricula, string $ferramentaPrincipal)
    {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->ferramentaPrincipal = $ferramentaPrincipal;
    }

    public function criarLayout(): string // declarado em Designer
    {
        return "{$this->nome} está criando um layout no {$this->ferramentaPrincipal}.";
    }
}

/*
 * Onde cada método foi declarado:
 *  - apresentar()  -> Pessoa         (herdado por Funcionario e Programador)
 *  - trabalhar()   -> Funcionario    (herdado por Programador e Designer)
 *  - programar()   -> Programador    (específico)
 *  - criarLayout() -> Designer       (específico)
 */

$prog = new Programador("Lucas Alves", "lucas@empresa.com", 8000, "F-1001", "PHP");

echo "<pre>";
echo $prog->apresentar() . PHP_EOL;  // vem de Pessoa
echo $prog->trabalhar() . PHP_EOL;   // vem de Funcionario
echo $prog->programar() . PHP_EOL;   // vem de Programador
echo "</pre>";
