<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
    :root {
        --p5-red: #e60012;
        --p5-shadow: #ff0037;
        --p5-dark: #9e0000;
        --font-main: 'Poppins', sans-serif;
        --font-title: 'Bebas Neue', cursive;
    }

    body {
        font-family: var(--font-main);
        margin: 0;
        padding: 0;
        background: #000;
        color: white;
    }

    #bg-video {
        position: fixed;
        top: 0; left: 0;
        width: 100vw; height: 100vh;
        object-fit: cover;
        z-index: -2;
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

    .sidebar-toggle {
        position: fixed;
        top: 20px; left: 20px;
        z-index: 10;
        background: white;
        color: var(--p5-red);
        border: none;
        font-size: 1.6rem;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        box-shadow: 2px 2px 5px #000;
    }

    .sidebar {
        width: 280px;
        background: rgba(230, 0, 18, 0.95);
        padding: 20px;
        position: fixed;
        top: 0;
        left: -320px;
        height: 100vh;
        z-index: 9;
        border: 4px solid white;
        box-shadow: 6px 6px 0 #000;
        transition: all 0.3s ease;
    }

    .sidebar.active {
        left: 0;
    }

    .sidebar h4 {
        font-family: var(--font-title);
        font-size: 2.2rem;
        margin-bottom: 30px;
        text-shadow: 2px 2px 0 #000;
        color: #fff;
    }

    .sidebar .nav-link,
    .btn-logout,
    .btn-profile {
        display: block;
        width: 100%;
        background: #fff;
        color: var(--p5-red);
        font-weight: 700;
        border: 2px solid var(--p5-red);
        border-radius: 6px;
        padding: 10px 12px;
        margin-bottom: 10px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 0 8px var(--p5-shadow), inset 0 -4px 0 var(--p5-dark);
        cursor: pointer;
    }

    .sidebar .nav-link:hover,
    .btn-logout:hover,
    .btn-profile:hover {
        background-color: var(--p5-red);
        color: white;
        box-shadow: 0 0 20px var(--p5-shadow), inset 0 -4px 0 #ff0047;
    }

    .main-content {
        margin-left: 0;
        padding: 30px 40px;
    }

    .welcome-message h3 {
        font-family: var(--font-title);
        font-size: 3.5rem;
        text-shadow: 2px 2px 0 var(--p5-shadow), -1px -1px 0 #000;
        margin-bottom: 30px;
    }

    .card {
        background: rgba(255, 255, 255, 0.07);
        border: 4px solid var(--p5-red);
        box-shadow: 6px 6px 0 #000, -2px -2px 0 #fff;
        border-radius: 0;
        max-width: 1000px;
        margin: auto;
        padding: 25px 30px;
    }

    .card-header h5 {
        font-family: var(--font-title);
        font-size: 2rem;
        text-shadow: 2px 2px 0 var(--p5-shadow), -1px -1px 0 #000;
    }

    .p5-btn, .p5-btn-alt {
        padding: 0.6rem 1.1rem;
        font-size: 1.15rem;
        font-weight: 700;
        border-radius: 6px;
        letter-spacing: 1.2px;
        cursor: pointer;
        text-decoration: none;
    }

    .p5-btn {
        background: var(--p5-red);
        color: white;
        border: 2px solid white;
        box-shadow: 0 0 8px var(--p5-shadow), inset 0 -4px 0 var(--p5-dark);
    }

    .p5-btn:hover {
        background: white;
        color: var(--p5-red);
        transform: scale(1.05);
    }

    .p5-btn-alt {
        background: white;
        color: var(--p5-red);
        border: 2px solid var(--p5-red);
        box-shadow: 0 0 8px var(--p5-red), inset 0 -4px 0 #a00012;
    }

    .p5-btn-alt:hover {
        background: var(--p5-red);
        color: white;
        transform: scale(1.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead tr {
        background-color: var(--p5-red);
    }

    thead th, tbody td {
        padding: 10px 12px;
        border: 1px solid #fff;
        text-align: center;
    }

    .alert {
        background-color: #ffc107;
        color: black;
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .modal-profile {
        position: fixed;
        top: 70px;
        left: 300px;
        background: #fff;
        color: #000;
        padding: 15px 20px;
        border-radius: 6px;
        box-shadow: 2px 2px 10px #000;
        display: none;
        z-index: 20;
    }
</style>

<video autoplay muted loop playsinline id="bg-video">
    <source src="<?= base_url('videos/p5_rainy.mp4') ?>" type="video/mp4" />
</video>

<button class="sidebar-toggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar" id="sidebar">
    <div class="nav flex-column">
                <h4>Thieves Den</h4>
        <?php if (session()->get('logged_in')) : ?>
            <button class="btn-profile" onclick="toggleProfile()">Profile Detail</button>
            <a href="<?= base_url('logout') ?>" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> LOGOUT
            </a>
        <?php endif; ?>
    </div>

</div>

<?php if (session()->get('logged_in')) : ?>
    <div class="modal-profile" id="profileModal">
        <strong>Nama:</strong> <?= esc(session()->get('username')) ?><br>
    </div>
<?php endif; ?>

<div class="main-content">
    <?php if (session()->get('logged_in')) : ?>
        <div class="welcome-message mb-4">
            <h3>Welcome, <?= esc(session()->get('username')) ?></h3>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>BOOK LIST</h5>
            <a href="<?= base_url('buku/create') ?>" class="p5-btn btn-sm">+ Add Book</a>
        </div>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Release Year</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($posts)) : ?>
                    <?php foreach ($posts as $row) : ?>
                        <tr>
                            <td><?= esc($row['judul']) ?></td>
                            <td><?= esc($row['penulis']) ?></td>
                            <td><?= esc($row['penerbit']) ?></td>
                            <td><?= esc($row['tahun_terbit']) ?></td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                      action="<?= base_url('buku/delete/' . $row['id']) ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="<?= base_url('buku/edit/' . $row['id']) ?>" class="p5-btn-alt btn-sm" style="font-size: 0.9rem;">Edit</a>
                                    <button type="submit" class="p5-btn btn-sm" style="font-size: 0.9rem;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="5">Nothing....</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($pager->hasMore() || $pager->getCurrentPage() > 1): ?>
            <div class="mt-3"><?= $pager->links() ?></div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<script>
    function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.querySelector(".sidebar-toggle");

    sidebar.classList.toggle("active");

    if (sidebar.classList.contains("active")) {
        toggleBtn.style.display = "none";
    } else {
        toggleBtn.style.display = "block";
    }
}


    function toggleProfile() {
        const modal = document.getElementById("profileModal");
        modal.style.display = modal.style.display === "block" ? "none" : "block";
    }

    document.addEventListener("click", function (event) {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.querySelector(".sidebar-toggle");
    const modal = document.getElementById("profileModal");

    if (!sidebar.contains(event.target) && !event.target.closest(".sidebar-toggle")) {
        sidebar.classList.remove("active");
        modal.style.display = "none";
        toggleBtn.style.display = "block"; 
    }
});


    $(document).ready(function () {
        setTimeout(() => {
            $('.alert').fadeOut('slow');
        }, 3000);
    });
</script>
<?= $this->endSection() ?>
