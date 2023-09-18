<?= $this->extend('template/FooHed'); ?>

<?= $this->section('content'); ?>

<div class="container" id="myDiv1" style="display: none;">

    <div class="card mb-3 mt-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= $makanan['image']; ?>" class="img-fluid rounded-start" alt="Test32">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $makanan['nama_makanan']; ?></h5>
                    <p class="card-text"><?= $makanan['deskripsi']; ?></p>
                    <p class="card-text"><?= $makanan['harga_makanan']; ?> <b> Rp</b>  Per porsi</p>
                    <p class="card-text"><small class="text-body-secondary"><?= $makanan['created_at']; ?></small></p>
                    <a href="/makanan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?= $this->endSection(); ?>