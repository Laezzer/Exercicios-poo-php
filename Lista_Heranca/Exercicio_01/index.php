<?php
// Exercício 1 — Veículos

class Veiculo
{
    protected string $marca;
    protected string $modelo;
    protected int $ano;

    public function __construct(string $marca, string $modelo, int $ano)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function exibirDados(): string
    {
        return "Marca: {$this->marca} | Modelo: {$this->modelo} | Ano: {$this->ano}";
    }
}

class Carro extends Veiculo
{
    private int $quantidadePortas; // atributo ESPECÍFICO de Carro

    public function __construct(string $marca, string $modelo, int $ano, int $quantidadePortas)
    {
        parent::__construct($marca, $modelo, $ano); // preenche os atributos HERDADOS
        $this->quantidadePortas = $quantidadePortas;
    }

    public function exibirDados(): string
    {
        return parent::exibirDados() . " | Portas: {$this->quantidadePortas}";
    }
}

class Moto extends Veiculo
{
    private int $cilindradas; // atributo ESPECÍFICO de Moto

    public function __construct(string $marca, string $modelo, int $ano, int $cilindradas)
    {
        parent::__construct($marca, $modelo, $ano);
        $this->cilindradas = $cilindradas;
    }

    public function exibirDados(): string
    {
        return parent::exibirDados() . " | Cilindradas: {$this->cilindradas}cc";
    }
}

/*
 * Atributos HERDADOS de Veiculo (em Carro e Moto): marca, modelo, ano
 * Atributo ESPECÍFICO de Carro: quantidadePortas
 * Atributo ESPECÍFICO de Moto: cilindradas
 * Método herdado: exibirDados() (reaproveitado via parent::exibirDados())
 */

$carro = new Carro("Toyota", "Corolla", 2022, 4);
$moto = new Moto("Honda", "CB 500", 2021, 500);

echo "<pre>";
echo "Carro: " . $carro->exibirDados() . PHP_EOL;
echo "Moto : " . $moto->exibirDados() . PHP_EOL;
echo "</pre>";
