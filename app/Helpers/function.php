<?php

function abrevName($value): string
{
    $value = mb_strtolower($value);
    $des = ['da', 'de', 'di', 'do', 'du', 'das', 'des', 'dis', 'dos', 'dus', 'la', 'le', 'li', 'lo', 'lu', 'las', 'los', 'les'];
    $contar = explode(" ", $value);
    $contar = array_diff($contar, $des);
    $contar = array_values($contar);
    // $contar = array_filter($contar);
    if (count($contar) >=2) {
        if (strlen($contar[1]) > 3) {
            $result = array_diff($contar, $des);
            $result = array_values($result);
            $val2 = ucfirst($result[0])." ".ucfirst(substr($result[1], 0, 1).".");
            return $val2;
        }
        $result = array_diff($contar, $des);
        $result = array_values($result);
        $val2 = ucfirst($result[0]);
        return $val2;
    }
    $value = mb_strtolower($value);
    return ucfirst($value);
}
