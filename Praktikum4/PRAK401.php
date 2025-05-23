<?php
$nilaierror = "";
$panjang = $lebar = $nilai = "";
$tampilkan = false;

if (isset($_POST['submit'])) {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $nilai = $_POST['nilai'];

    $isValid = true;


    $arrayNilai = explode(" ", trim($nilai));
    if (count($arrayNilai) != $panjang * $lebar) {
        $nilaierror = "Panjang nilai tidak sesuai dengan ukuran matriks";
        $isValid = false;
    }

    if ($isValid) {
        $tampilkan = true;
    }
}
?>


<style>
    table {
        border-collapse: collapse;
    }
    td {
        border: 1px solid black;
        width: 30px;
        height: 30px;
        text-align: center;
    }
</style>

<form action="" method="post">
    Panjang: <input type="text" name="panjang" value="<?= $panjang ?>"> <br>
    Lebar: <input type="text" name="lebar" value="<?= $lebar ?>"> <br>
    Nilai: <input type="text" name="nilai" value="<?= $nilai ?>"><br> 
    <button type="submit" name="submit">Cetak</button>
</form>

<?php

if (!empty($nilaierror)) {
    echo "<div class='error'>$nilaierror</div>";
}

if ($tampilkan) {
    $arrayNilai = explode(" ", $nilai);
    echo "<br><table>";
    $index = 0;
    for ($i = 0; $i < $lebar; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $panjang; $j++) {
            if (isset($arrayNilai[$index])) {
                echo "<td>" . $arrayNilai[$index] . "</td>";
            } else {
                echo "<td></td>";
            }
            $index++;
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
