<?php
class Pedido
{
    private $cliente;
    private $valor;

    private static $todos = [];

    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        self::$todos[] = $this; // registra o proprio objeto
    }

    public function exibir()
    {
        echo "Cliente: " . $this->cliente . " | Valor: R$ " . number_format($this->valor, 2, ',', '.') . "<br>";
    }

    public static function listarTodos()
    {
        foreach (self::$todos as $obj) {
            $obj->exibir();
        }
    }

    public function getCliente() { return $this->cliente; }
    public function setCliente($cliente) { $this->cliente = $cliente; }
    public function getValor() { return $this->valor; }
    public function setValor($valor) { $this->valor = $valor; }
}
