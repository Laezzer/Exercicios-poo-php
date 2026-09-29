<?php
/*
 * DIFERENCA ENTRE self::$algo E $this->algo
 *
 * $this->algo  -> acessa o membro de INSTANCIA: pertence a UM objeto especifico.
 *                 Cada objeto tem o seu proprio valor. So existe dentro de metodos
 *                 nao estaticos (precisa de um objeto).
 * self::$algo  -> acessa o membro de CLASSE (static): pertence a classe e e
 *                 compartilhado por todos os objetos. Funciona mesmo sem nenhum
 *                 objeto criado, inclusive dentro de metodos static.
 */

class Contador
{
    private $nome;
    public static $total = 0;

    public function __construct($nome)
    {
        $this->nome = $nome; // instancia
        self::$total++;      // classe
    }

    /* ---------- ERRO PROPOSITAL (deixado comentado para a pagina continuar rodando) ----------
    public static function mostrarNome()
    {
        return $this->nome;
    }
    Contador::mostrarNome();

    Erro observado ao executar:
    Fatal error: Uncaught Error: Using $this when not in object context
    Motivo: metodo static roda sem objeto, entao $this nao existe.
    ------------------------------------------------------------------------------------------ */

    // CORRECAO 1: metodo static usa somente membros static, via self::
    public static function mostrarTotal()
    {
        return "Total de objetos: " . self::$total;
    }

    // CORRECAO 2: se precisa do dado do objeto, o metodo deve ser de instancia
    public function mostrarNome()
    {
        return "Nome: " . $this->nome;
    }
}

$a = new Contador("Primeiro");
$b = new Contador("Segundo");

echo Contador::mostrarTotal() . "<br>"; // Total de objetos: 2
echo $a->mostrarNome() . "<br>";        // Nome: Primeiro
echo $b->mostrarNome();                 // Nome: Segundo
