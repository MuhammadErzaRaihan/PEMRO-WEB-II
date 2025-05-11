<?php
require_once("Model.php");

if (isset($_GET['hapus'])) {
    deleteLoan($_GET['hapus']);
    header("Location: Peminjaman.php");
    exit;
}

$data = ['id_member'=>'','id_buku'=>'','tgl_pinjam'=>'','tgl_kembali'=>''];
$id = $_GET['id'] ?? null;

if ($id) {
    $data = getLoanById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = [
        'id_member' => $_POST['id_member'],
        'id_buku' => $_POST['id_buku'],
        'tgl_pinjam' => $_POST['tgl_pinjam'],
        'tgl_kembali' => $_POST['tgl_kembali']
    ];

    if ($id) updateLoan($id, $postData);
    else insertLoan($postData);

    header("Location: Peminjaman.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? 'Edit Peminjaman' : 'Tambah Peminjaman' ?></title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-image: url('library.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.95);
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
        input[type="number"],
        input[type="date"] {
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
        <h2><?= $id ? 'Edit Data Peminjaman' : '+ Data Peminjaman' ?></h2>
        <form method="post">
            <label for="id_member">ID Member:</label>
            <input type="number" id="id_member" name="id_member" value="<?= htmlspecialchars($data['id_member']) ?>" required>

            <label for="id_buku">ID Buku:</label>
            <input type="number" id="id_buku" name="id_buku" value="<?= htmlspecialchars($data['id_buku']) ?>" required>

            <label for="tgl_pinjam">Tanggal Pinjam:</label>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam" value="<?= htmlspecialchars($data['tgl_pinjam']) ?>" required>

            <label for="tgl_kembali">Tanggal Kembali:</label>
            <input type="date" id="tgl_kembali" name="tgl_kembali" value="<?= htmlspecialchars($data['tgl_kembali']) ?>" required>

            <button type="submit"><?= $id ? 'Update' : 'Simpan' ?></button>
        </form>
        <a href="Peminjaman.php" class="back-link"> <- Back </a>
    </div>
</body>
</html>
