<?php
// Classe utilitaria: so metodos static, nao precisa ser instanciada.
class Formatador
{
    public static function moeda($valor)
    {
        return "R$ " . number_format($valor, 2, ',', '.');
    }

    public static function paraMaiusculas($texto)
    {
        return mb_strtoupper($texto, 'UTF-8');
    }

    public static function validarValor($valor)
    {
        return is_numeric($valor) && $valor > 0;
    }
}
