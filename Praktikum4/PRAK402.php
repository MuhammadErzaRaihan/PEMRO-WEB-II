<?php
// Data awal
$mahasiswa = [
    [
        "nama" => "Andi",
        "nim" => "2101001",
        "uts" => 87,
        "uas" => 65
    ],
    [
        "nama" => "Budi",
        "nim" => "2101002",
        "uts" => 76,
        "uas" => 79
    ],
    [
        "nama" => "Tono",
        "nim" => "2101003",
        "uts" => 50,
        "uas" => 41
    ],
    [
        "nama" => "Jessica",
        "nim" => "2101004",
        "uts" => 60,
        "uas" => 75
    ]
];

// Menambahkan Nilai Akhir dan Nilai Huruf
foreach ($mahasiswa as $key => $data) {
    $nilaiAkhir = (0.4 * $data['uts']) + (0.6 * $data['uas']);
    $huruf = '';

    if ($nilaiAkhir >= 80) {
        $huruf = 'A';
    } elseif ($nilaiAkhir >= 70) {
        $huruf = 'B';
    } elseif ($nilaiAkhir >= 60) {
        $huruf = 'C';
    } elseif ($nilaiAkhir >= 50) {
        $huruf = 'D';
    } else {
        $huruf = 'E';
    }

    // Tambahkan ke array
    $mahasiswa[$key]['nilai_akhir'] = round($nilaiAkhir, 1);
    $mahasiswa[$key]['huruf'] = $huruf;
}

?>
<style>
    table {
        border-collapse: collapse;
        width: 75%;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      
    }
    th {
        background-color: #ddd; /* abu-abu muda */
    }
</style>

<table>
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>
    </tr>
    <?php foreach ($mahasiswa as $mhs): ?>
        <tr>
            <td><?= $mhs['nama'] ?></td>
            <td><?= $mhs['nim'] ?></td>
            <td><?= $mhs['uts'] ?></td>
            <td><?= $mhs['uas'] ?></td>
            <td><?= $mhs['nilai_akhir'] ?></td>
            <td><?= $mhs['huruf'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>