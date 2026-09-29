<?php
class Pedido
{
    const STATUS_PENDENTE = "pendente";
    const STATUS_PAGO = "pago";
    const STATUS_ENVIADO = "enviado";

    private $cliente;
    private $status;

    public function __construct($cliente, $status = self::STATUS_PENDENTE)
    {
        $this->cliente = $cliente;
        $this->status = $status;
    }

    public function getCliente() { return $this->cliente; }
    public function setCliente($cliente) { $this->cliente = $cliente; }
    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
}
