<?= $this->extend('layout/template.php'); ?>
<?= $this->section('content'); ?>
<div class="container"><div class="row"><div class="col">
    <h3 class="text-center">Daftar Anggota</h3>
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th class="text-center" scope="row" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + (6 * ($currentPage - 1)); foreach ($anggota as $a) : ?>
                <tr>
                    <th class="col-md-1" scope="row" class="text-center"><?= $no++; ?></th>
                    <td class="col-md-3"><?= $a['nama'] ?></td>
                    <td class="col-md-4"><?= $a['alamat'] ?></td>
                    <td class="col-md-2"><?= $a['nomor'] ?></td>
                    <td class="col-md-1"><a href="#" class="btn btn-primary">Edit</a></td>
                    <td class="col-md-1"><a href="#" class="btn btn-danger">Hapus</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links('anggota', 'anggota_pagenation'); ?>
</div></div></div>
<?= $this->endSection(); ?>