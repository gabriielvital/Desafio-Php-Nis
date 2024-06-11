<?php

class GenerateNis{
    public function generate()
    {
        $nisBase = '';
        for ($i = 0; $i < 10; $i++) {
            $nisBase .= rand(0, 9);
        }

        $multiplicadores = [3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $total = 0;

        for ($i = 0; $i < 10; $i++) {
            $total += $nisBase[$i] * $multiplicadores[$i];
        }

        $resto = $total % 11;
        $digitoVerificador = $resto < 2 ? 0 : 11 - $resto;

        $nisBase .= $digitoVerificador;

        return $nisBase;
    }
}
?>