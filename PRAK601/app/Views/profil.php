<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle at center, #0f0f0f, #000000 90%);
            color: #f8f9fa;
            font-family: 'Orbitron', sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/black-linen.png');
            opacity: 0.05;
            z-index: -1;
        }

        .navbar {
            background-color: #0a0a0a;
            border-bottom: 2px solid #00ffff;
            box-shadow: 0 0 12px #00ffff88;
        }

        .navbar-brand, .nav-link {
            color: #00ffff !important;
            font-family: 'Share Tech Mono', monospace;
            letter-spacing: 1px;
        }

        .nav-link.active {
            color: #ff00cc !important;
        }

        .card {
            background: linear-gradient(145deg, #1a1a1a, #0a0a0a);
            border: 1px solid #ff00cc;
            border-radius: 16px;
            box-shadow: 0 0 25px #ff00cc66;
        }

        .card-header {
            background-color: #ff00cc;
            color: white;
            border-bottom: 2px solid #00ffff;
            text-shadow: 0 0 10px #000;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #00ffff;
            box-shadow: 0 0 20px #ff00cc, 0 0 30px #00ffff88;
        }

        .fw-bold {
            color: #00ffff;
            text-shadow: 0 0 5px #00ffff;
        }

        .col-md-8 {
            color: #ffff33;
            font-family: 'Share Tech Mono', monospace;
        }

        .row.mb-3, .row:last-child {
            padding-bottom: 12px;
            border-bottom: 1px dashed #333;
        }

        h3.mb-0 {
            text-shadow: 0 0 10px #ff00cc, 0 0 5px #fff;
            font-weight: bold;
        }

        a.nav-link:hover {
            text-shadow: 0 0 10px #ff00cc;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">⚡ Praktikum 6</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/">Beranda</a>
                <a class="nav-link active" href="/profile">Profil</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="mb-0">Profil Praktikan</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <?php if (!empty($profil['gambar'])): ?>
                                <img src="/uploads/<?= esc($profil['gambar']) ?>" 
                                     class="profile-img" 
                                     alt="Foto Profil">
                            <?php endif; ?>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Nama Lengkap</div>
                            <div class="col-md-8"><?= esc($profil['nama_lengkap']) ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">NIM</div>
                            <div class="col-md-8"><?= esc($profil['nim']) ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Program Studi</div>
                            <div class="col-md-8"><?= esc($profil['prodi']) ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Hobi</div>
                            <div class="col-md-8"><?= esc($profil['hobi']) ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 fw-bold">Skill</div>
                            <div class="col-md-8"><?= esc($profil['skill']) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
