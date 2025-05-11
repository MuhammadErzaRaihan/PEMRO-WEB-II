<?php
require_once("Model.php");
$books = getAllBooks();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
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
            background-color: rgba(255, 255, 255, 0.95);
            margin: 50px auto;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .add-btn {
            display: inline-block;
            padding: 10px 16px;
            margin-bottom: 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: rgba(255, 255, 255, 0.85)
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
            
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
        <h2>Daftar Buku</h2>
        <a href="FormBuku.php" class="add-btn"> + Add Book</a>
        <table>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Opsi</th>
            </tr>
            <?php while($b = $books->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($b['judul_buku']) ?></td>
                <td><?= htmlspecialchars($b['penulis']) ?></td>
                <td><?= htmlspecialchars($b['penerbit']) ?></td>
                <td><?= htmlspecialchars($b['tahun_terbit']) ?></td>
                <td class="action-buttons">
                    <a href="FormBuku.php?id=<?= $b['id_buku'] ?>" class="edit-btn"> Edit</a>
                    <a href="FormBuku.php?hapus=<?= $b['id_buku'] ?>" class="delete-btn" onclick="return confirm('Hapus?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="index.php" class="back-link"> <- Home </a>
    </div>
</body>
</html>
