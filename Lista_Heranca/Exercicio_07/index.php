<?php
// Exercício 7 — Sistema de entregas

/*
 * Hierarquia:
 *
 *                 Entrega
 *        (codigo, destino, distancia, exibirDados())
 *                   ^
 *          ---------+----------
 *          |                  |
 *     EntregaMoto        EntregaDrone
 *  (placa, entregador,   (modeloDrone, autonomiaKm,
 *   realizarEntrega())    realizarEntrega())
 *
 * Membros HERDADOS (por EntregaMoto e EntregaDrone): codigo, destino, distancia, exibirDados()
 * Membros ESPECÍFICOS de EntregaMoto: placa, entregador, realizarEntrega()
 * Membros ESPECÍFICOS de EntregaDrone: modeloDrone, autonomiaKm, realizarEntrega()
 */

class Entrega
{
    protected string $codigo;
    protected string $destino;
    protected float $distancia; // km

    public function __construct(string $codigo, string $destino, float $distancia)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->distancia = $distancia;
    }

    public function exibirDados(): string
    {
        return "Entrega {$this->codigo} | Destino: {$this->destino} | Distância: {$this->distancia} km";
    }
}

class EntregaMoto extends Entrega
{
    private string $placa;
    private string $entregador;

    public function __construct(string $codigo, string $destino, float $distancia, string $placa, string $entregador)
    {
        parent::__construct($codigo, $destino, $distancia);
        $this->placa = $placa;
        $this->entregador = $entregador;
    }

    public function realizarEntrega(): string
    {
        return "Moto {$this->placa} com {$this->entregador} entregou em {$this->destino} ({$this->distancia} km).";
    }
}

class EntregaDrone extends Entrega
{
    private const DISTANCIA_MAXIMA_KM = 20;

    private string $modeloDrone;
    private int $autonomiaKm;

    public function __construct(string $codigo, string $destino, float $distancia, string $modeloDrone, int $autonomiaKm)
    {
        parent::__construct($codigo, $destino, $distancia);
        $this->modeloDrone = $modeloDrone;
        $this->autonomiaKm = $autonomiaKm;
    }

    public function realizarEntrega(): string
    {
        if ($this->distancia > self::DISTANCIA_MAXIMA_KM) {
            return "ENTREGA RECUSADA: drone {$this->modeloDrone} não faz entregas acima de "
                . self::DISTANCIA_MAXIMA_KM . " km (pedido: {$this->distancia} km).";
        }
        return "Drone {$this->modeloDrone} entregou em {$this->destino} ({$this->distancia} km).";
    }
}

echo "<pre>";
echo "=== Entrega por moto ===" . PHP_EOL;
$moto = new EntregaMoto("M-01", "Centro", 5, "ABC-1234", "Pedro");
echo $moto->exibirDados() . PHP_EOL . $moto->realizarEntrega() . PHP_EOL . PHP_EOL;

echo "=== Drone: cenário válido (8 km) ===" . PHP_EOL;
$d1 = new EntregaDrone("D-01", "Bairro Norte", 8, "SkyX 200", 30);
echo $d1->exibirDados() . PHP_EOL . $d1->realizarEntrega() . PHP_EOL . PHP_EOL;

echo "=== Drone: cenário inválido (25 km) ===" . PHP_EOL;
$d2 = new EntregaDrone("D-02", "Zona Rural", 25, "SkyX 200", 30);
echo $d2->exibirDados() . PHP_EOL . $d2->realizarEntrega() . PHP_EOL;
echo "</pre>";
