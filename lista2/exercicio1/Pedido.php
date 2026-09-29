<?php
class Pedido
{
    private $cliente;
    private $valor;

    // Propriedade de CLASSE (compartilhada por todos os objetos)
    public static $totalPedidos = 0;

    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        self::$totalPedidos++; // self:: e nunca $this->
    }

    public function getCliente() { return $this->cliente; }
    public function setCliente($cliente) { $this->cliente = $cliente; }
    public function getValor() { return $this->valor; }
    public function setValor($valor) { $this->valor = $valor; }
}
