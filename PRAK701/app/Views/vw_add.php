<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .p5-card {
        background: rgba(255, 255, 255, 0.07);
        border: 4px solid #e60000;
        box-shadow: 6px 6px 0px #000, -2px -2px 0px #fff;
        color: #fff;
    }

    .p5-header {
        font-weight: bold;
        font-size: 1.5rem;
        background-color: #e60000;
        color: white;
        text-shadow: 1px 1px 2px #000;
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
        box-shadow: 0 0 8px #ff0037, inset 0 -4px 0 #9e0000;
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
        text-shadow: 1px 1px 2px #660000;
        padding: 0.6rem 1.2rem;
    }

    .p5-btn:hover {
        background-color: white;
        color: #e60012;
        box-shadow: 0 0 20px #ff0037, inset 0 -4px 0 #ff0047;
        transform: scale(1.05);
    }

    .p5-btn-alt {
        background-color: white;
        color: #e60012;
        font-weight: 700;
        font-size: 1.15rem;
        border: 2px solid #e60012;
        border-radius: 6px;
        box-shadow: 0 0 8px #e60012, inset 0 -4px 0 #a00012;
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
        padding: 0.6rem 1.2rem;
    }

    .p5-btn-alt:hover {
        background-color: #e60012;
        color: white;
        box-shadow: 0 0 20px #ff0037, inset 0 -4px 0 #ff0047;
        transform: scale(1.05);
    }

    .alert-danger {
        background-color: #ffc107;
        color: #000;
        border: 2px solid #e60000;
        font-weight: bold;
        box-shadow: 0 0 10px #e60000;
    }
</style>

<canvas id="rain-canvas" style="position: fixed; top: 0; left: 0; z-index: 0; pointer-events: none;"></canvas>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p5-card">
                <div class="card-header p5-header text-center">
                    <?= $title ?>
                </div>
                <div class="card-body">

                    <?php if (session()->getFlashdata('validation')) : ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('validation') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?= form_open('buku/store'); ?>
                    <div class="mb-3">
                        <label class="form-label">📖 Title</label>
                        <input type="text" class="form-control" name="judul" value="<?= old('judul') ?>" placeholder="Insert Title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">✍️ Author</label>
                        <input type="text" class="form-control" name="penulis" value="<?= old('penulis') ?>" placeholder="Insert Author" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">🏢 Publisher</label>
                        <input type="text" class="form-control" name="penerbit" value="<?= old('penerbit') ?>" placeholder="Insert Publisher" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">📆 Release Year</label>
                        <input type="number" class="form-control" name="tahun_terbit" value="<?= old('tahun_terbit') ?>" placeholder="Insert Release Year" required>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="p5-btn">💾 Save</button>
                        <a href="<?= base_url('home') ?>" class="p5-btn-alt">← Back</a>
                    </div>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => el.style.display = 'none');
    }, 3000);

    const canvas = document.getElementById('rain-canvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const drops = [];
    const dropCount = 150;

    for (let i = 0; i < dropCount; i++) {
        drops.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            length: Math.random() * 15 + 10,
            speed: Math.random() * 3 + 2
        });
    }

    function drawRain() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.strokeStyle = 'rgba(255, 255, 255, 0.3)';
        ctx.lineWidth = 1;

        for (let i = 0; i < drops.length; i++) {
            const d = drops[i];
            ctx.beginPath();
            ctx.moveTo(d.x, d.y);
            ctx.lineTo(d.x, d.y + d.length);
            ctx.stroke();

            d.y += d.speed;
            if (d.y > canvas.height) {
                d.y = -20;
                d.x = Math.random() * canvas.width;
            }
        }

        requestAnimationFrame(drawRain);
    }

    drawRain();

    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
</script>

<?= $this->endSection() ?>
