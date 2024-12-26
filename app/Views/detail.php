<?php $this->extend('layout/template.php') ?>

<?= $this->section('content') ?>
<h1>Detail Buku</h1>
<div class="container">
    <div class="row">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/img/<?= $buku['sampul'] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $buku['judul'] ?></h5>
                        <p class="card-text">Pengarang: <?= $buku['pengarang'] ?></p>
                        <p class="card-text">Tahun terbit: <?= $buku['tahun_terbit'] ?></p>
                        <p class="card-text"><small class="text-body-secondary"><?= $buku['penerbit'] ?></small></p>

                        <a href="/buku/edit/<?= $buku['id_buku']?>" class="btn btn-warning">Edit</a>
                        <form action="/buku/delete/<?= $buku['id_buku'] ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus data')">Hapus</button>
                        </form>
                        <div class="mt-3">
                            <a href="/">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>