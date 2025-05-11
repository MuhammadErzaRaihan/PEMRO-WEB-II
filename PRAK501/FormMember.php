<?php
require_once("Model.php");

if (isset($_GET['hapus'])) {
    deleteMember($_GET['hapus']);
    header("Location: Member.php");
    exit;
}

$data = ['nama'=>'','nomor'=>'','alamat'=>'','tgl_daftar'=>'','tgl_bayar'=>''];
$id = $_GET['id'] ?? null;

if ($id) {
    $row = getMemberById($id);
    if ($row) $data = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = [
        'nama' => $_POST['nama'],
        'nomor' => $_POST['nomor'],
        'alamat' => $_POST['alamat'],
        'tgl_daftar' => $_POST['tgl_mendaftar'],
        'tgl_bayar' => $_POST['tgl_terakhir_bayar']
    ];

    if ($id) updateMember($id, $postData);
    else insertMember($postData);

    header("Location: Member.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? 'Edit Member' : 'Tambah Member' ?></title>
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
        input[type="date"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-family: 'Georgia', serif;
        }
        textarea {
            resize: vertical;
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
        <h2><?= $id ? 'Edit Data Member' : '+ Data Member' ?></h2>
        <form method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

            <label for="nomor">Nomor:</label>
            <input type="text" id="nomor" name="nomor" value="<?= htmlspecialchars($data['nomor']) ?>" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required><?= htmlspecialchars($data['alamat']) ?></textarea>

            <label for="tgl_mendaftar">Tgl Daftar:</label>
            <input type="datetime-local" id="tgl_mendaftar" name="tgl_mendaftar"
                value="<?= $data['tgl_daftar'] ? date('Y-m-d\TH:i', strtotime($data['tgl_daftar'])) : '' ?>" required>

            <label for="tgl_terakhir_bayar">Tgl Bayar:</label>
            <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" value="<?= $data['tgl_bayar'] ?>" required>

            <button type="submit"><?= $id ? 'Update' : 'Simpan' ?></button>
        </form>
        <a href="Member.php" class="back-link">← Kembali</a>
    </div>
</body>
</html>
