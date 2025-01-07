<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Form Tambah Anggota</h1>
            <hr>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-8">
            <form class="" method="post" action="/anggota/save">
                <?php csrf_field(); ?>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input name="nama" value="<?= old('nama') ?>" type="text" class="form-control <?= isset($validate['nama']) ? 'is-invalid' : ""; ?>" id="nama" aria-describedby="namaFeedback">
                        <?php if (isset($validate['nama'])) : ?>
                            <div id="namaFeedback" class="invalid-feedback">
                                <?= $validate['nama'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input name="alamat" value="<?= old('alamat') ?>" type="text" class="form-control <?= isset($validate['alamat']) ? 'is-invalid' : ""; ?>" id="alamat" aria-describedby="alamatFeedback">
                        <?php if (isset($validate['alamat'])) : ?>
                            <div id="alamatFeedback" class="invalid-feedback">
                                <?= $validate['alamat'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nomor" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input name="nomor" value="<?= old('nomor') ?>" type="text" class="form-control <?= isset($validate['nomor']) ? 'is-invalid' : ""; ?>" id="nomor" aria-describedby="nomorFeedback">
                        <?php if (isset($validate['nomor'])) : ?>
                            <div id="nomorFeedback" class="invalid-feedback">
                                <?= $validate['nomor'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="/anggota" class="btn btn-danger">Kembali</a>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

