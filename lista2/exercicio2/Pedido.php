<?php
class Pedido
{
    private $cliente;
    private $valor;

    public static $totalPedidos = 0;
    public static $valorTotalVendido = 0; // acumulador numerico

    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        self::$totalPedidos++;
        self::$valorTotalVendido += $valor; // soma o valor, nao apenas +1
    }

    public function getCliente() { return $this->cliente; }
    public function setCliente($cliente) { $this->cliente = $cliente; }
    public function getValor() { return $this->valor; }
    public function setValor($valor) { $this->valor = $valor; }
}
