<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="main-box">
    <h1 class="display-4 mb-3" style="font-family: 'Bebas Neue', sans-serif; color: #fff; text-shadow: 2px 2px #e60000;">
        WELCOME TO <span style="color:rgb(240, 240, 240);">THIEVES DEN</span>
    </h1>
    <p class="lead" style="color: #eee;">☆☆☆☆☆☆☆</p>

    <hr style="border-top: 2px dashed #e60000; width: 60%; margin: 2rem auto;">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-weight: bold;">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('home') ?>" class="btn p5-btn m-2">
        <i class="fas fa-book"></i> Book Data
    </a>

    <?php if (session()->get('logged_in')): ?>
        <p class="mt-4" style="font-weight: bold; font-size: 1.2rem; color: #fff;">
            Halo, <span style="color: #ffeb3b;"><?= esc(session()->get('username')) ?></span> 👋
        </p>
        <a href="<?= base_url('logout') ?>" class="btn p5-btn-alt m-2">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    <?php else: ?>
        <a href="<?= base_url('login') ?>" class="btn p5-btn m-2">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <a href="<?= base_url('register') ?>" class="btn p5-btn-alt m-2">
            <i class="fas fa-user-plus"></i> Register
        </a>
    <?php endif; ?>
</div>

<style>
    .p5-btn {
        background-color: #e60012;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        border: 2px solid white;
        border-radius: 6px;
        box-shadow:
            0 0 5px #ff0037,
            inset 0 -4px 0 #9e0000;
        transition: 
            background-color 0.3s ease, 
            box-shadow 0.3s ease,
            transform 0.2s ease;
        text-shadow: 1px 1px 2px #660000;
    }

    .p5-btn:hover {
        background-color: white;
        color: #e60012;
        box-shadow:
            0 0 15px #ff0037,
            inset 0 -4px 0 #ff0047;
        transform: scale(1.05);
        text-shadow: none;
    }

    .p5-btn-alt {
        background-color: white;
        color: #e60012;
        font-weight: 700;
        font-size: 1.1rem;
        border: 2px solid #e60012;
        border-radius: 6px;
        box-shadow:
            0 0 5px #e60012,
            inset 0 -4px 0 #a00012;
        transition: 
            background-color 0.3s ease, 
            box-shadow 0.3s ease,
            transform 0.2s ease;
        text-shadow: 1px 1px 2px #880000;
    }

    .p5-btn-alt:hover {
        background-color: #e60012;
        color: white;
        box-shadow:
            0 0 15px #ff0037,
            inset 0 -4px 0 #ff0047;
        transform: scale(1.05);
        text-shadow: none;
    }
</style>

<?= $this->endSection() ?>
