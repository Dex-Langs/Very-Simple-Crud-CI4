<?= $this->extend('template/FooHed'); ?>

<?= $this->section('content'); ?>
<br>
<div class="container" id="myDivs" style="display: none;">
    <div class="row">
        <div class="col">
            <!-- <div class="row row-cols-1 row-cols-md-3 g-4"> -->
            <div class="card ms-3 px-5 p-5" style="max-width: 600;">


                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($errors)) : ?>
                    <div class="alert alert-danger">
                        <?= \Config\Services::validation()->listErrors() ?>
                    </div>
                <?php endif; ?>

                <form action="/storemakanan" method="post" enctype="multipart/form-data">
                    <?php csrf_field() ?>
                    <h4 class="card-title mb-3">
                        Form tambah makanan
                    </h4>
                    <label for="nama_makanan">Nama Makanan :</label>
                    <br>
                    <div class="input-group flex-nowrap mb-3">
                        <input type="text" class="form-control" name="nama_makanan" placeholder="Nama makanan" aria-label="Nama Makanan" aria-describedby="addon-wrapping" required>
                    </div>
                    <label for="slug">Slug :</label>
                    <br>
                    <div class="input-group flex-nowrap mb-3">
                        <input type="text" class="form-control" name="slug" placeholder="Slug" aria-label="Slug" aria-describedby="addon-wrapping" required>
                    </div>
                    <label for="deskripsi">Deskripsi :</label>
                    <br>
                    <div class="input-group flex-nowrap mb-3">
                        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" aria-label="Deskripsi" aria-describedby="addon-wrapping">
                    </div>
                    <label for="harga_makanan">Harga Makanan :</label>
                    <br>
                    <div class="input-group mb-3">
                        <input type="number" name="harga_makanan" class="form-control" aria-label="Harga Makanan (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                        <span class="input-group-text">Rp</span>
                    </div>
                    <label for="image">Pilih gambar makanan :</label>
                    <br>
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file" name="file_upload" class="form-control" id="inputGroupFile01">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mt-4" type="submit">Save</button>
                    </div>
                </form>

                <!-- </div> -->
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>