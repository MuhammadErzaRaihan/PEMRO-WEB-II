<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="" method="post">
        Batas Bawah: 
        <input type="number" name="bawah" value="<?= isset($_POST['bawah']) ? $_POST['bawah'] : '' ?>">
        <br>
        Batas Atas: 
        <input type="number" name="atas" value="<?= isset($_POST['atas']) ? $_POST['atas'] : '' ?>">
        <br>
        <input type="submit" name="cetak" value="Cetak">
    </form>
    <?php
    if (isset($_POST['cetak'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];
        $i = $bawah;

        $img = "star.png";

        do {
            if ((($i + 7) % 5) == 0) {
                echo "<img src='$img' width='20px'>";
            } else {
                echo $i . " ";
            }
            $i++;
        } while ($i <= $atas);
    }
    ?>
</body>
</html>
