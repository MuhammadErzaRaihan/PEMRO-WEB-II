<?php
$namaerror = $nimerror = $gendererror = "";
$nama = $nim = $gender = "";
$tampilkan = false;

if (isset($_POST['submit'])) {
    if (empty($_POST['nama'])) {
        $namaerror = "<span style='color:red'>* nama tidak boleh kosong</span>";
    } else {
        $nama = $_POST['nama'];
    }

    if (empty($_POST['nim'])) {
        $nimerror = "<span style='color:red'>* nim tidak boleh kosong</span>";
    } else {
        $nim = $_POST['nim'];
    }

    if (empty($_POST['gender'])) {
        $gendererror = "<span style='color:red'>* jenis kelamin tidak boleh kosong</span>";
    } else {
        $gender = $_POST['gender'];
    }

    if ($nama && $nim && $gender) {
        $tampilkan = true;
    }
}
?>

<form action="" method="post">
    Nama: <input type="text" name="nama" value="<?= $nama ?>"> <?= $namaerror ?><br>
    NIM: <input type="text" name="nim" value="<?= $nim ?>"> <?= $nimerror ?><br>
    Jenis Kelamin : <?= $gendererror ?><br>
    <input type="radio" name="gender" value="Laki-laki" <?= ($gender == "Laki-laki") ? "checked" : "" ?>> Laki-Laki <br>
    <input type="radio" name="gender" value="Perempuan" <?= ($gender == "Perempuan") ? "checked" : "" ?>> Perempuan <br>
    <button type="submit" name="submit">Submit</button>
</form>

<?php
if (isset($_POST['submit']) && $tampilkan) {
    echo "<h2>Output:</h2>";
    echo $nama . "<br>";
    echo $nim . "<br>";
    echo $gender;
}
?>
