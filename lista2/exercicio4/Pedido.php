<?php
class Pedido
{
    private $cliente;
    private $valor;

    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
    }

    // Metodo fabrica: cria e devolve um objeto com valores padrao
    public static function criarPadrao()
    {
        return new self("Sem nome", 0);
    }

    public function getCliente() { return $this->cliente; }
    public function setCliente($cliente) { $this->cliente = $cliente; }
    public function getValor() { return $this->valor; }
    public function setValor($valor) { $this->valor = $valor; }
}
