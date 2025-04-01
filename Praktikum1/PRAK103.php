<?php

$celcius = 37.841;

//konversi ke reamur
$reamur = (4/5) * $celcius;

//konversi ke fahrenheit
$fahrenheit = ($celcius * 9/5) + 32;

//konversi ke kelvin
$kelvin = $celcius + 273.15;

echo "Fahrenheit (F) = " . number_format($fahrenheit, 4, ',', '') . "<br>";
echo "Reamur (R) = " . number_format($reamur, 4, ',', '') . "<br>";
echo "Kelvin (K) = " . number_format($kelvin, 4, ',', '') . "<br>";

?>
