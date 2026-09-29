<?php
require_once 'Pedido.php';
require_once 'Formatador.php';

$p1 = new Pedido("Ana", 100);
$p2 = new Pedido("Bruno", 250);
$p3 = new Pedido("Carla", 75.5);

foreach ([$p1, $p2, $p3] as $p) {
    echo $p->getCliente() . " - total com entrega: " . Formatador::moeda($p->calcularTotal()) . "<br>";
}

echo "<br>Pedidos criados: " . Pedido::$totalPedidos . "<br>";
echo "Taxa de entrega fixa: " . Formatador::moeda(Pedido::TAXA_ENTREGA);
