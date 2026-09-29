<?php
require_once 'Pedido.php';

$p1 = new Pedido("Ana", 100.50);
$p2 = new Pedido("Bruno", 250.00);
$p3 = new Pedido("Carla", 75.25);

echo "Pedidos criados: " . Pedido::$totalPedidos . "<br>";
echo "Valor total vendido: R$ " . number_format(Pedido::$valorTotalVendido, 2, ',', '.'); // 425,75
