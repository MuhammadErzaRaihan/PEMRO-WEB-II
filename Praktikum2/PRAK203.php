<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu</title>
</head>
<body>

<form method="post" action="">
    <label>Nilai : <input type="number" name="nilai" step="any" value="<?= $_POST['nilai'] ?? '' ?>"></label><br><br>

    Dari :<br>
    <?php $dari = $_POST['dari'] ?? ''; ?>
    <input type="radio" name="dari" value="C" <?= ($dari == 'C') ? 'checked' : '' ?>> Celcius<br>
    <input type="radio" name="dari" value="F" <?= ($dari == 'F') ? 'checked' : '' ?>> Fahrenheit<br>
    <input type="radio" name="dari" value="R" <?= ($dari == 'R') ? 'checked' : '' ?>> Reamur<br>
    <input type="radio" name="dari" value="K" <?= ($dari == 'K') ? 'checked' : '' ?>> Kelvin<br><br>

    Ke :<br>
    <?php $ke = $_POST['ke'] ?? ''; ?>
    <input type="radio" name="ke" value="C" <?= ($ke == 'C') ? 'checked' : '' ?>> Celcius<br>
    <input type="radio" name="ke" value="F" <?= ($ke == 'F') ? 'checked' : '' ?>> Fahrenheit<br>
    <input type="radio" name="ke" value="R" <?= ($ke == 'R') ? 'checked' : '' ?>> Reamur<br>
    <input type="radio" name="ke" value="K" <?= ($ke == 'K') ? 'checked' : '' ?>> Kelvin<br><br>

    <button type="submit" name="konversi">Konversi</button>
</form>

<?php
if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];

    // Konversi ke Celcius dulu
    switch ($dari) {
        case 'C': $celcius = $nilai; break;
        case 'F': $celcius = ($nilai - 32) * 5/9; break;
        case 'R': $celcius = $nilai * 5/4; break;
        case 'K': $celcius = $nilai - 273.15; break;
        default: $celcius = 0;
    }

    // Konversi dari Celcius ke target
    switch ($ke) {
        case 'C': $hasil = $celcius; $satuan = '°C'; break;
        case 'F': $hasil = ($celcius * 9/5) + 32; $satuan = '°F'; break;
        case 'R': $hasil = $celcius * 4/5; $satuan = '°R'; break;
        case 'K': $hasil = $celcius + 273.15; $satuan = 'K'; break;
        default: $hasil = 0; $satuan = '';
    }

    echo "<h3>Hasil Konversi: " . number_format($hasil, 1) . " $satuan</h3>";
}
?>

</body>
</html>
