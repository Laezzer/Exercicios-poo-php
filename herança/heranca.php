<?php

class Pessoa
{
    protected string $nome;
    protected int $idade;
    protected string $sexo;

    public function __construct(string $nome, int $idade, string $sexo)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
    }

    public function fazerAniversario(): void
    {
        $this->idade++;
        echo "{$this->nome} fez aniversário e agora tem {$this->idade} anos.\n";
    }
}

class Visitante extends Pessoa
{
}

class Professor extends Pessoa
{
    private string $especialidade;
    private float $salario;

    public function __construct(string $nome, int $idade, string $sexo, string $especialidade, float $salario)
    {
        parent::__construct($nome, $idade, $sexo);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function receberAumento(float $percentual): void
    {
        $this->salario += $this->salario * $percentual / 100;
        echo "{$this->nome} recebeu {$percentual}% de aumento. Novo salário: R$ "
            . number_format($this->salario, 2, ',', '.') . "\n";
    }
}

class Aluno extends Pessoa
{
    protected string $matricula;
    protected string $curso;

    public function __construct(string $nome, int $idade, string $sexo, string $matricula, string $curso)
    {
        parent::__construct($nome, $idade, $sexo);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function pagarMensalidade(): void
    {
        echo "{$this->nome} (matrícula {$this->matricula}) pagou a mensalidade do curso {$this->curso}.\n";
    }
}

class Bolsista extends Aluno
{
    private float $bolsa;

    public function __construct(string $nome, int $idade, string $sexo, string $matricula, string $curso, float $bolsa)
    {
        parent::__construct($nome, $idade, $sexo, $matricula, $curso);
        $this->bolsa = $bolsa;
    }

    public function renovarBolsa(): void
    {
        echo "{$this->nome} renovou a bolsa de {$this->bolsa}%.\n";
    }

    // Sobrescreve o método da superclasse
    public function pagarMensalidade(): void
    {
        echo "{$this->nome} é bolsista ({$this->bolsa}%) e pagou a mensalidade com desconto.\n";
    }
}

class Tecnico extends Aluno
{
    private string $registroProfissional;

    public function __construct(string $nome, int $idade, string $sexo, string $matricula, string $curso, string $registroProfissional)
    {
        parent::__construct($nome, $idade, $sexo, $matricula, $curso);
        $this->registroProfissional = $registroProfissional;
    }

    public function praticar(): void
    {
        echo "{$this->nome} (registro {$this->registroProfissional}) está praticando a profissão.\n";
    }
}

// ---- Testes ----
$visitante = new Visitante("Carlos", 40, "M");
$visitante->fazerAniversario();

$professor = new Professor("Ana", 35, "F", "Programação", 5000);
$professor->receberAumento(10);

$aluno = new Aluno("João", 18, "M", "2026001", "Informática");
$aluno->pagarMensalidade();

$bolsista = new Bolsista("Maria", 19, "F", "2026002", "Informática", 50);
$bolsista->pagarMensalidade();
$bolsista->renovarBolsa();

$tecnico = new Tecnico("Pedro", 22, "M", "2026003", "Eletrotécnica", "CRT-1234");
$tecnico->pagarMensalidade();
$tecnico->praticar();
