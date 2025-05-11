<?php
require_once("Model.php");

if (isset($_GET['hapus'])) {
    deleteBook($_GET['hapus']);
    header("Location: Buku.php");
    exit;
}

$data = ['judul_buku'=>'','penulis'=>'','penerbit'=>'','tahun_terbit'=>''];
$id = $_GET['id'] ?? null;

if ($id) {
    $data = getBookById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = [
        'judul' => $_POST['judul'],
        'penulis' => $_POST['penulis'],
        'penerbit' => $_POST['penerbit'],
        'tahun' => $_POST['tahun']
    ];

    if ($id) updateBook($id, $postData);
    else insertBook($postData);

    header("Location: Buku.php");
    exit;
}

?>




<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? 'Edit Buku' : 'Tambah Buku' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('library.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: rgba(255,255,255,0.95);
            width: 90%;
            max-width: 600px;
            margin: 60px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #2196F3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?= $id ? 'Edit Data Buku' : '+ Data Buku' ?></h2>
        <form method="post">
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($data['judul_buku']) ?>" required>

            <label for="penulis">Penulis:</label>
            <input type="text" id="penulis" name="penulis" value="<?= htmlspecialchars($data['penulis']) ?>" required>

            <label for="penerbit">Penerbit:</label>
            <input type="text" id="penerbit" name="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>" required>

            <label for="tahun">Tahun Terbit:</label>
            <input type="number" id="tahun" name="tahun" min="1000" value="<?= htmlspecialchars($data['tahun_terbit']) ?>" required>

            <button type="submit"><?= $id ? 'Update' : 'Simpan' ?></button>
        </form>
        <a href="Buku.php" class="back-link"> <- Back </a>
    </div>
</body>
</html>
