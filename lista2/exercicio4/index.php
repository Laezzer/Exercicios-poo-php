<?php
require_once 'Pedido.php';

// Nenhum "new" aqui fora da classe
$pedido = Pedido::criarPadrao();

echo "Tipo: " . get_class($pedido) . "<br>";         // Pedido
echo "Cliente: " . $pedido->getCliente() . "<br>";   // Sem nome
echo "Valor: " . $pedido->getValor() . "<br>";       // 0

$pedido->setCliente("Ana"); // objeto normal, pode ser alterado
echo "Depois do set: " . $pedido->getCliente();
