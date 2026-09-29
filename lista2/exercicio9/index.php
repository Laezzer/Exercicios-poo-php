<?php
require_once 'Pedido.php';

// Sem guardar em variaveis: a propria classe guarda os objetos
new Pedido("Ana", 100);
new Pedido("Bruno", 250);
new Pedido("Carla", 75.5);

Pedido::listarTodos();
