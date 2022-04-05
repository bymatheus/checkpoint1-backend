<?php
    function salarioLiquido($salario, $dependentes)
    {
        $salario = preg_replace(
            '/,/',
            '.',
            $salario
        );

        $salarioDescontado = calcularINSS($salario);

        return $salarioDescontado - calculaIRRF($salarioDescontado, $dependentes);
    }


    function calcularINSS($salario)
    {
        switch ($salario) {
            case $salario<=1212:
                return $salario / 100 * 7.5;
            case $salario <= 2427.35:
                return $salario / 100 * 9;
            case $salario <= 3641.03:
                return $salario / 100 * 12;
            case $salario <= 7087.22:
                return $salario / 100 * 14;
            default:
                return $salario - 828.39;
        }
    }

    function calculaIRRF($valorBaseIR1, $dependentes)
    {
        $valorBaseIR2 = $valorBaseIR1 - ($dependentes * 189.57);

        if ($valorBaseIR2 <= 1903.98) {
            return 0;
        }

        if ($valorBaseIR2 >= 1903.9 and $valorBaseIR2 <= 2826.65) {
            return ($valorBaseIR2 / 100 * 7.5) - 142.80;
        }

        if ($valorBaseIR2 >= 2826.6 and $valorBaseIR2 <= 3751.05) {
            return ($valorBaseIR2 / 100 * 15) - 354.80;
        }

        if ($valorBaseIR2 >= 3751.06 and $valorBaseIR2 <= 4664.68) {
            return ($valorBaseIR2 / 100 * 22.5) - 636.13;
        }

        return ($valorBaseIR2 / 100 * 27.5) - 869.36;
    }