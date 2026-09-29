<?php
class Pedido
{
    const TAXA_ENTREGA = 10.00;

    private $cliente;
    private $valor;

    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
    }

    // Usa a constante dentro de um metodo
    public function calcularTotal()
    {
        return $this->valor + self::TAXA_ENTREGA;
    }

    public function getCliente() { return $this->cliente; }
    public function setCliente($cliente) { $this->cliente = $cliente; }
    public function getValor() { return $this->valor; }
    public function setValor($valor) { $this->valor = $valor; }
}
