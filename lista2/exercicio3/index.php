<?php
require_once 'Formatador.php';

// Chamadas diretas pela classe, sem "new"
echo Formatador::moeda(1234.5) . "<br>";                       // R$ 1.234,50
echo Formatador::paraMaiusculas("pedido confirmado") . "<br>"; // PEDIDO CONFIRMADO
echo Formatador::validarValor(-5) ? "valido" : "invalido";     // invalido
