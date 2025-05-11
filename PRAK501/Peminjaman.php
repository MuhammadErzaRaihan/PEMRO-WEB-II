<?php
require_once("Model.php");
$loans = getAllLoans();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <style>
        body {
            font-family: Georgia, serif;
            background-image: url('library.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.2);
            margin: 60px auto;
            padding: 30px;
            width: 90%;
            max-width: 900px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        a.add-link {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
        a.add-link:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255,255,255,0.95);
        }
        th, td {
             padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f3f3f3;
        }
        td a {
            margin: 0 5px;
            color: #2196F3;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
        .action-buttons a {
            padding: 6px 12px;
            margin: 2px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }
        .edit-btn {
            background-color:rgb(255, 217, 0);
        }
        .delete-btn {
            background-color:rgb(255, 0, 0);
        }
        .back-link {
            display: inline-block;
            padding: 10px 16px;
            margin-top: 20px;
            text-align: left;
            text-decoration: none;
            background-color:rgb(163, 214, 255);
            border-radius: 6px;

        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Peminjaman</h2>
        <a href="FormPeminjaman.php" class="add-link">+ Tambah Data</a>
        <table>
            <tr>
                <th>ID Member</th>
                <th>ID Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Opsi</th>
            </tr>
            <?php while($p = $loans->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($p['id_member']) ?></td>
                <td><?= htmlspecialchars($p['id_buku']) ?></td>
                <td><?= htmlspecialchars($p['tgl_pinjam']) ?></td>
                <td><?= htmlspecialchars($p['tgl_kembali']) ?></td>
                <td class="action-buttons">
                    <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman'] ?>"class="edit-btn">Edit</a>
                    <a href="FormPeminjaman.php?hapus=<?= $p['id_peminjaman'] ?>"class="delete-btn" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="index.php" class="back-link"> <- Home </a>
    </div>
</body>
</html>
