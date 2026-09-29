<?php
require_once 'Pedido.php';

$p1 = new Pedido("Ana");                          // pendente (padrao)
$p2 = new Pedido("Bruno", Pedido::STATUS_PAGO);   // pago
$p3 = new Pedido("Carla");
$p3->setStatus(Pedido::STATUS_ENVIADO);           // alteracao com constante

echo $p1->getCliente() . ": " . $p1->getStatus() . "<br>";
echo $p2->getCliente() . ": " . $p2->getStatus() . "<br>";
echo $p3->getCliente() . ": " . $p3->getStatus();
