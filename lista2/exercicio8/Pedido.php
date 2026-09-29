<?php
class Pedido
{
    const TAXA_ENTREGA = 10.00;

    public static $totalPedidos = 0;

    private $cliente;
    private $valor;

    // 2 parametros obrigatorios
    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        self::$totalPedidos++;
    }

    public function calcularTotal()
    {
        return $this->valor + self::TAXA_ENTREGA;
    }

    public function getCliente() { return $this->cliente; }
    public function setCliente($cliente) { $this->cliente = $cliente; }
    public function getValor() { return $this->valor; }
    public function setValor($valor) { $this->valor = $valor; }
}
