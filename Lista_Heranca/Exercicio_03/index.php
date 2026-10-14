<?php
// Exercício 3 — Sistema acadêmico

class Pessoa
{
    protected string $nome;
    protected int $idade;
    protected string $email;

    public function __construct(string $nome, int $idade, string $email)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }

    public function apresentar(): string
    {
        return "Olá, sou {$this->nome}, tenho {$this->idade} anos. E-mail: {$this->email}";
    }
}

class Aluno extends Pessoa
{
    private string $matricula;
    private string $curso;

    public function __construct(string $nome, int $idade, string $email, string $matricula, string $curso)
    {
        parent::__construct($nome, $idade, $email);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function estudar(): string
    {
        return "{$this->nome} (matrícula {$this->matricula}) está estudando para o curso de {$this->curso}.";
    }
}

class Professor extends Pessoa
{
    private string $especialidade;
    private float $salario;

    public function __construct(string $nome, int $idade, string $email, string $especialidade, float $salario)
    {
        parent::__construct($nome, $idade, $email);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function ministrarAula(): string
    {
        return "{$this->nome} está ministrando aula de {$this->especialidade}.";
    }
}

/*
 * apresentar() funciona em Aluno e Professor porque foi declarado em Pessoa
 * (superclasse), é public, e as duas classes usam "extends Pessoa". Os atributos
 * nome, idade e email são protected, então a subclasse (via herança) os acessa
 * dentro do método herdado, sem precisar duplicar o código.
 */

$aluno1 = new Aluno("Maria Silva", 20, "maria@email.com", "2024001", "Sistemas de Informação");
$aluno2 = new Aluno("João Pereira", 22, "joao@email.com", "2024002", "Engenharia de Software");
$professor = new Professor("Dra. Helena Costa", 45, "helena@escola.edu", "Programação Orientada a Objetos", 12000);

echo "<pre>";
foreach ([$aluno1, $aluno2, $professor] as $p) {
    echo $p->apresentar() . PHP_EOL;
}
echo PHP_EOL;
echo $aluno1->estudar() . PHP_EOL;
echo $aluno2->estudar() . PHP_EOL;
echo $professor->ministrarAula() . PHP_EOL;
echo "</pre>";
