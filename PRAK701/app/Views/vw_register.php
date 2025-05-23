<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>

        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
            filter: brightness(0.3) contrast(1.2);
        }

        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        body {
            font-family: 'Poppins', sans-serif;

            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.07);
            padding: 2.5rem;
            border-radius: 0;
            max-width: 500px;
            width: 90%;
            border: 4px solid #e60000;
            box-shadow: 6px 6px 0px #000, -2px -2px 0px #fff;
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            font-family: 'Bebas Neue', cursive;
            font-size: 2.8rem;
            color: #fff;
            text-shadow: 2px 2px 0 #e60000, -1px -1px 0 #000;
            margin-bottom: 1.5rem;
        }

        p.intro-text {
            text-align: center;
            font-weight: 600;
            letter-spacing: 2px;
            margin-bottom: 2rem;
            color: #eee;
            text-shadow: 1px 1px 0 #e60000;
        }

        label {
            font-weight: 600;
            color: #fff;
        }

        .form-control {
            background-color: #222;
            border: 1px solid #444;
            color: white;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            background-color: #111;
            color: white;
            border-color: #e60000;
            box-shadow: 0 0 0 0.2rem rgba(230, 0, 0, 0.4);
        }

        .p5-btn {
            background-color: #e60012;
            color: white;
            font-weight: 700;
            font-size: 1.15rem;
            border: 2px solid white;
            border-radius: 6px;
            box-shadow:
                0 0 8px #ff0037,
                inset 0 -4px 0 #9e0000;
            transition:
                background-color 0.3s ease,
                box-shadow 0.3s ease,
                transform 0.2s ease;
            text-shadow: 1px 1px 2px #660000;
            padding: 0.75rem;
            letter-spacing: 1.2px;
        }

        .p5-btn:hover {
            background-color: white;
            color: #e60012;
            box-shadow:
                0 0 20px #ff0037,
                inset 0 -4px 0 #ff0047;
            transform: scale(1.05);
            text-shadow: none;
            text-decoration: none;
        }

        .p5-btn-alt {
            background-color: white;
            color: #e60012;
            font-weight: 700;
            font-size: 1.15rem;
            border: 2px solid #e60012;
            border-radius: 6px;
            box-shadow:
                0 0 8px #e60012,
                inset 0 -4px 0 #a00012;
            transition:
                background-color 0.3s ease,
                box-shadow 0.3s ease,
                transform 0.2s ease;
            text-shadow: 1px 1px 2px #880000;
            padding: 0.75rem;
            letter-spacing: 1.2px;
        }

        .p5-btn-alt:hover {
            background-color: #e60012;
            color: white;
            box-shadow:
                0 0 20px #ff0037,
                inset 0 -4px 0 #ff0047;
            transform: scale(1.05);
            text-shadow: none;
            text-decoration: none;
        }

        .alert {
            font-weight: bold;
            color: #000;
            background-color: #ffc107;
            border-color: #e0a800;
            box-shadow: 0 0 10px #e60000;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>

<body>
    <video autoplay muted loop playsinline id="bg-video">
        <source src="<?= base_url('videos/p5_rainy.mp4') ?>" type="video/mp4" />
        Your browser does not support the video tag.
    </video>

    <div class="register-container">
        <h1>📝 REGISTRATION</h1>

        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>⚠️ INVALID REGISTRATION </strong>
                <?= \Config\Services::validation()->listErrors(); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url(); ?>/register/process">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="username" class="form-label">👤 Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">🔒 Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="mb-3">
                <label for="password_conf" class="form-label">🔁 Confirm Password</label>
                <input type="password" class="form-control" id="password_conf" name="password_conf" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">📧 E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required />
            </div>
            <div class="d-grid gap-3">
                <button type="submit" class="p5-btn">🚀 Register</button>
                <a href="<?= base_url('/') ?>" class="p5-btn-alt text-center">← Back</a>
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
