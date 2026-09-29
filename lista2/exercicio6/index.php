<?php
require_once 'Pedido.php';

$pedido = new Pedido("Ana", 90);

echo "Taxa de entrega: R$ " . Pedido::TAXA_ENTREGA . "<br>";
echo "Total com entrega: R$ " . $pedido->calcularTotal(); // 100
