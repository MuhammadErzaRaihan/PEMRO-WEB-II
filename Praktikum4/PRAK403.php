<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data KRS Mahasiswa</title>
    <style>
        table, tr, td, th {
            border: solid 1px black;
            border-collapse: collapse;
            padding: 5px;
        }
        table {
            width: 700px;
        }
        table tr th {
            background-color: lightgray;
            text-align: left;
        }
    </style>
</head>
<body>


<?php
$krs = [
    [
        "nama" => "Ridho",
        "matkul" => [
            ["mk" => "Pemrograman I", "sks" => 2],
            ["mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["mk" => "Arsitektur Komputer", "sks" => 3],
        ]
    ],
    [
        "nama" => "Ratna",
        "matkul" => [
            ["mk" => "Basis Data I", "sks" => 2],
            ["mk" => "Praktikum Basis Data I", "sks" => 1],
            ["mk" => "Kalkulus", "sks" => 3],
        ]
    ],
    [
        "nama" => "Tono",
        "matkul" => [
            ["mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["mk" => "Komputasi Awan", "sks" => 3],
            ["mk" => "Kecerdasan Bisnis", "sks" => 3],
        ]
    ]
];

// Proses menghitung total SKS dan keterangan
$nilai = [];
for ($i = 0; $i < count($krs); $i++) {
    $total = 0;
    for ($j = 0; $j < count($krs[$i]["matkul"]); $j++) {
        $total += $krs[$i]["matkul"][$j]["sks"];
    }
    $nilai[$i]["no"] = $i + 1;
    $nilai[$i]["nama"] = $krs[$i]["nama"];
    $nilai[$i]["matkul"] = $krs[$i]["matkul"];
    $nilai[$i]["totalSks"] = $total;
    $nilai[$i]["keterangan"] = ($total < 7) ? "Revisi KRS" : "Tidak Revisi";
}
?>

<style>
    table, tr, td, th {
        border: solid 1px black;
        border-collapse: collapse;
        padding: 5px;
    }
    table {
        width: 700px;
    }
    table tr th {
        background-color: lightgray;
        text-align: left;
    }
</style>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>

<?php
for ($i=0; $i < count($nilai); $i++) {
    for ($j=0; $j < count($nilai[$i]["matkul"]); $j++) { 
        echo "<tr>";
        if ($j == 0) {
            echo "<td>".$nilai[$i]["no"]."</td>";
            echo "<td>".$nilai[$i]["nama"]."</td>";
            echo "<td>".$nilai[$i]["matkul"][$j]["mk"]."</td>";
            echo "<td>".$nilai[$i]["matkul"][$j]["sks"]."</td>";
            echo "<td>".$nilai[$i]["totalSks"]."</td>";
            if ($nilai[$i]["keterangan"] == "Revisi KRS"){
                echo '<td style="background-color: red; color: white;">'.$nilai[$i]["keterangan"]."</td>";
            } else {
                echo '<td style="background-color: green; color: white;">'.$nilai[$i]["keterangan"]."</td>"; 
            }
        } else {
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>".$nilai[$i]["matkul"][$j]["mk"]."</td>";
            echo "<td>".$nilai[$i]["matkul"][$j]["sks"]."</td>";
            echo "<td></td>";
            echo "<td></td>";
        }
        echo "</tr>";
    }
}
?>
</table>
</body>
</html>