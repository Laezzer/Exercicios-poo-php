<?php
// Exercício 4 — Loja virtual

class Produto
{
    protected string $nome;
    protected float $preco;
    protected string $codigo;

    public function __construct(string $nome, float $preco, string $codigo)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->codigo = $codigo;
    }

    public function exibirProduto(): string
    {
        return "[{$this->codigo}] {$this->nome} — R$ " . number_format($this->preco, 2, ',', '.');
    }

    // Retorna true se o desconto foi aplicado; false se o percentual é inválido.
    public function aplicarDesconto(float $percentual): bool
    {
        if ($percentual < 0 || $percentual > 100) {
            return false; // preço NÃO é alterado
        }
        $this->preco -= $this->preco * ($percentual / 100);
        return true;
    }
}

class Livro extends Produto
{
    private string $autor;
    private string $isbn;

    public function __construct(string $nome, float $preco, string $codigo, string $autor, string $isbn)
    {
        parent::__construct($nome, $preco, $codigo);
        $this->autor = $autor;
        $this->isbn = $isbn;
    }

    public function exibirProduto(): string
    {
        return parent::exibirProduto() . " | Autor: {$this->autor} | ISBN: {$this->isbn}";
    }
}

class Eletronico extends Produto
{
    private string $marca;
    private int $garantiaMeses;

    public function __construct(string $nome, float $preco, string $codigo, string $marca, int $garantiaMeses)
    {
        parent::__construct($nome, $preco, $codigo);
        $this->marca = $marca;
        $this->garantiaMeses = $garantiaMeses;
    }

    public function exibirProduto(): string
    {
        return parent::exibirProduto() . " | Marca: {$this->marca} | Garantia: {$this->garantiaMeses} meses";
    }
}

function testarDesconto(Produto $p, float $percentual): void
{
    echo "Antes : " . $p->exibirProduto() . PHP_EOL;
    if ($p->aplicarDesconto($percentual)) {
        echo "Desconto de {$percentual}% aplicado." . PHP_EOL;
    } else {
        echo "Desconto de {$percentual}% INVÁLIDO — preço mantido." . PHP_EOL;
    }
    echo "Depois: " . $p->exibirProduto() . PHP_EOL . PHP_EOL;
}

$livro = new Livro("Clean Code", 100.00, "L001", "Robert C. Martin", "978-0132350884");
$eletronico = new Eletronico("Notebook", 2000.00, "E001", "Dell", 12);

echo "<pre>";
echo "=== Cenário válido ===" . PHP_EOL;
testarDesconto($livro, 10);
testarDesconto($eletronico, 15);

echo "=== Cenário inválido (percentual negativo) ===" . PHP_EOL;
testarDesconto($livro, -5);
echo "</pre>";
