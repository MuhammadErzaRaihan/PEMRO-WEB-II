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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .nav-link:hover {
            text-shadow: 0 0 8px #ff00cc;
        }

        .cyber-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
        }

        h1 {
            color:rgb(255, 230, 0);
            text-shadow: 0 0 10px #ffde59, 0 0 20px #ff00cc;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        p {
            font-size: 1.5rem;
            color: #00ffff;
            text-shadow: 0 0 5px #00ffff;
            font-family: 'Share Tech Mono', monospace;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">⚡ Praktikum 6</a>
            <div class="navbar-nav">
                <a class="nav-link active" href="/">Beranda</a>
                <a class="nav-link" href="/profile">Profil</a>
            </div>
        </div>
    </nav>

    <div class="container cyber-container">
        <h1>PRAK601</h1>
        <p>Nama: <?= esc($nama_lengkap) ?></p>
        <p>NIM: <?= esc($nim) ?></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
