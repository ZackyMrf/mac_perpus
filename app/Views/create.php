<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Form Tambah Buku</h1>
            <hr>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-8">
            <form class="" method="post" action="/buku/save" enctype="multipart/form-data">
                <?php csrf_field(); ?>

                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input name="judul" value="<?= old('judul') ?>" type="text" class="form-control <?= isset($validate['judul']) ? 'is-invalid' : ""; ?>" id="judul" aria-describedby="judulFeedback">
                        <?php if (isset($validate['judul'])) : ?>
                            <div id="judulFeedback" class="invalid-feedback">
                                <?= $validate['judul'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                    <div class="col-sm-10">
                        <input name="pengarang" value="<?= old('pengarang') ?>" type="text" class="form-control <?= isset($validate['pengarang']) ? 'is-invalid' : ""; ?>" id="pengarang" aria-describedby="pengarangFeedback">
                        <?php if (isset($validate['pengarang'])) : ?>
                            <div id="pengarangFeedback" class="invalid-feedback">
                                <?= $validate['pengarang'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input name="penerbit" value="<?= old('penerbit') ?>" type="text" class="form-control <?= isset($validate['penerbit']) ? 'is-invalid' : ""; ?>" id="penerbit" aria-describedby="penerbitFeedback">
                        <?php if (isset($validate['penerbit'])) : ?>
                            <div id="penerbitFeedback" class="invalid-feedback">
                                <?= $validate['penerbit'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <input name="tahun_terbit" value="<?= old('tahun_terbit') ?>" type="text" class="form-control <?= isset($validate['tahun_terbit']) ? 'is-invalid' : ""; ?>" id="tahun_terbit" aria-describedby="tahun_terbitFeedback">
                        <?php if (isset($validate['tahun_terbit'])) : ?>
                            <div id="tahun_terbitFeedback" class="invalid-feedback">
                                <?= $validate['tahun_terbit'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control <?= isset($validate['sampul']) ? 'is-invalid' : ""; ?>" name="sampul" id="sampul" aria-describedby="sampulFeedback" onchange="previewImage()">
                        <?php if (isset($validate['sampul'])) : ?>
                            <div id="sampulFeedback" class="invalid-feedback">
                                <?= $validate['sampul'] ?>
                            </div>
                        <?php endif; ?>

                        <!-- Preview Gambar -->
                        <img id="imgPreview" src="" alt="Preview Gambar" class="img-thumbnail mt-2" style="display: none; max-width: 200px;">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="/" class="btn btn-danger">Kembali</a>

            </form>
        </div>
    </div>
</div>

<!-- JavaScript untuk Preview Gambar -->
<script>
    function previewImage() {
        const sampul = document.querySelector('#sampul');
        const imgPreview = document.querySelector('#imgPreview');

        // Tampilkan gambar preview
        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.style.display = 'block';
            imgPreview.src = e.target.result;
        }
    }
</script>

<?= $this->endSection(); ?>
