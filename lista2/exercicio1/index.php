<?php
require_once 'Pedido.php';

$p1 = new Pedido("Ana", 100);
$p2 = new Pedido("Bruno", 250);
$p3 = new Pedido("Carla", 75);

echo "Total de pedidos criados: " . Pedido::$totalPedidos; // 3
