<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 200px;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        Nama 1: <input type="text" name="nama1" required><br>
        Nama 2: <input type="text" name="nama2" required><br>
        Nama 3: <input type="text" name="nama3" required><br>
        <button type="submit" name="urut">Urutkan</button>
    </form>

    <?php
    if (isset($_POST['urut'])) {
        $nama1 = $_POST['nama1'];
        $nama2 = $_POST['nama2'];
        $nama3 = $_POST['nama3'];

        $daftar_nama = [$nama1, $nama2, $nama3];

        sort($daftar_nama, SORT_STRING | SORT_FLAG_CASE);

        echo "<table>";
        echo "<tr><th>Output</th></tr>";
        foreach ($daftar_nama as $nama) {
            echo "<tr><td>" . $nama . "</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
