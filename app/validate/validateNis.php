<?php

class ValidateNis{
    public function validar($nis)
    {
        if (strlen($nis) != 11) {
            return false;
        }

        $multiplicadores = [3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $total = 0;

        for ($i = 0; $i < 10; $i++) {
            $total += $nis[$i] * $multiplicadores[$i];
        }

        $resto = $total % 11;
        $digitoVerificador = $resto < 2 ? 0 : 11 - $resto;

        return $digitoVerificador == $nis[10];
    }
}
?>