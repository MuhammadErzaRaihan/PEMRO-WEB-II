<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .p5-card {
        background: #1f1f1f;
        border: 3px solid #ff0000;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.3);
        color: #fff;
    }

    .p5-header {
        background-color: #ff0000;
        color: #fff;
        font-weight: bold;
        font-size: 1.5rem;
        padding: 10px 20px;
        border-radius: 12px 12px 0 0;
    }

    .form-label {
        color: #ffcccb;
        font-weight: bold;
    }

    .form-control {
        background-color:rgb(36, 36, 36);
        color: #fff;
        border: 2px solid #ff0000;
        border-radius: 10px;
    }

    .form-control:focus {
        box-shadow: 0 0 5px #ff0000;
    }

    .btn-primary {
        background-color: #ff0000;
        border: none;
        font-weight: bold;
        color: #1f1f1f;
    }

    .btn-link {
        color: #1f1f1f;
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #cc0000;

    }

    .alert-danger {
        background-color: #ff4d4d;
        border: none;
        color: #fff;
        font-weight: bold;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p5-card">
                <div class="card-header p5-header text-center">
                    ✏️ <?= $title ?>
                </div>
                <div class="card-body">

                    <?php if (session()->getFlashdata('validation')) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('validation') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?= form_open('buku/update/' . $post['id']); ?>
                    <input type="hidden" name="_method" value="PUT">

                    <div class="mb-3">
                        <label class="form-label">📖 Title</label>
                        <input type="text" class="form-control" name="judul" value="<?= old('judul', $post['judul']) ?>" placeholder="Enter Title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">✍️ Author</label>
                        <input type="text" class="form-control" name="penulis" value="<?= old('penulis', $post['penulis']) ?>" placeholder="Enter Author" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">🏢 Publisher</label>
                        <input type="text" class="form-control" name="penerbit" value="<?= old('penerbit', $post['penerbit']) ?>" placeholder="Enter Publisher" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">📆 Release Year</label>
                        <input type="number" class="form-control" name="tahun_terbit"
                               value="<?= old('tahun_terbit', $post['tahun_terbit']) ?>"
                               placeholder="Insert Release Year"
                               required min="1801" max="2023">
                    </div>

                    <div class="form-group mt-4 d-flex justify-content-between">
                        <button class="btn btn-primary px-4">💾 Update</button>
                        <a href="<?= base_url('home') ?>" class="btn btn-link">⬅️ Back</a>
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
        $('.alert').fadeOut('slow');
    }, 3000);
</script>
<?= $this->endSection() ?>
