<?= $this->extend('layout/template') ?>


<?= $this->section('content'); ?>
<center>
    <h1>Daftar Buku Bacaan</h1>
</center>


<a href="/buku/create" class="btn btn-primary mb-2">Tambah Data</a>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-primary" role="alert">
        <?= session()->getFlashdata('success')?>
    </div>
<?php endif ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Sampul</th>
            <th scope="col">Judul</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($buku as $b) : ?>
            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><img src="/img/<?= $b['sampul'] ?>" alt="" width="75px"></td>
                <td><?= $b['judul'] ?></td>
                <td>
                    <a href="/buku/<?= $b['id_buku'] ?>" class="btn btn-success">Detail</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection(); ?>