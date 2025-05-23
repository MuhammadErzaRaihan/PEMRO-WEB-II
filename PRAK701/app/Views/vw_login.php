<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>

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
            z-index: -3;
            filter: brightness(0.3) contrast(1.2);
        }

        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: -2;
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
            overflow: hidden;
        }

        #rain-canvas {
            position: fixed;
            top: 0;
            left: 0;
            pointer-events: none; 
            width: 100vw;
            height: 100vh;
            z-index: -1;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.07);
            padding: 2.5rem;
            border-radius: 0;
            max-width: 400px;
            width: 90%;
            border: 4px solid #e60000;
            box-shadow: 6px 6px 0px #000, -2px -2px 0px #fff;
            animation: fadeIn 0.8s ease-in-out;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        h1 {
            font-family: 'Bebas Neue', cursive;
            font-size: 3rem;
            color: #fff;
            text-shadow: 2px 2px 0 #e60000, -1px -1px 0 #000;
            margin-bottom: 1.5rem;
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
            cursor: pointer;
            width: 100%;
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
            display: inline-block;
            text-align: center;
            width: 100%;
            margin-top: 0.75rem;
            cursor: pointer;
            text-decoration: none;
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
            margin-bottom: 1rem;
            text-align: left;
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

    <canvas id="rain-canvas"></canvas>

    <div class="login-container">
        <h1>🔐 LOGIN</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>⚠️ Login Failed! </strong>
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url(); ?>/login/process">
            <?= csrf_field(); ?>
            <div class="mb-3 text-start">
                <label for="username" class="form-label">👤 Username</label>
                <input type="text" class="form-control" id="username" name="username" required autofocus />
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">🔒 Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <button type="submit" class="p5-btn">🚀 Login</button>
        </form>

        <a href="<?= base_url('/') ?>" class="p5-btn-alt mt-3">← Back</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (() => {
            const canvas = document.getElementById('rain-canvas');
            const ctx = canvas.getContext('2d');

            let width, height;
            let raindrops = [];

            function resize() {
                width = window.innerWidth;
                height = window.innerHeight;
                canvas.width = width;
                canvas.height = height;
            }

            window.addEventListener('resize', resize);
            resize();

            class Raindrop {
                constructor() {
                    this.reset();
                }

                reset() {
                    this.x = Math.random() * width;
                    this.y = Math.random() * -height;
                    this.length = 10 + Math.random() * 15;
                    this.speed = 2 + Math.random() * 4;
                    this.opacity = 0.1 + Math.random() * 0.3;
                    this.width = 1;
                }

                update() {
                    this.y += this.speed;
                    if (this.y > height) this.reset();
                }

                draw() {
                    ctx.strokeStyle = `rgba(174,194,224,${this.opacity})`;
                    ctx.lineWidth = this.width;
                    ctx.beginPath();
                    ctx.moveTo(this.x, this.y);
                    ctx.lineTo(this.x, this.y + this.length);
                    ctx.stroke();
                }
            }

            function initRaindrops(count = 150) {
                raindrops = [];
                for (let i = 0; i < count; i++) {
                    raindrops.push(new Raindrop());
                }
            }

            function animate() {
                ctx.clearRect(0, 0, width, height);
                for (let drop of raindrops) {
                    drop.update();
                    drop.draw();
                }
                requestAnimationFrame(animate);
            }

            initRaindrops();
            animate();
        })();
    </script>
</body>

</html>
