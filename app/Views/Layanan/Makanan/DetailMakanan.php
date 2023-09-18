<?= $this->extend('template/FooHed'); ?>

<?= $this->section('content'); ?>

<div class="container" id="myDiv1" style="display: none;">

    <div class="card mb-3 mt-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/<?= $makanan['image']; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $makanan['nama_makanan']; ?></h5>
                    <p class="card-text"><?= $makanan['deskripsi']; ?></p>
                    <p class="card-text"><?= $makanan['harga_makanan']; ?> <b> Rp</b>  Per porsi</p>
                    <p class="card-text"><small class="text-body-secondary"><?= $makanan['created_at']; ?></small></p>
                    <a href="#" class="btn btn-outline-success mb-2">Edit</a>
                    |
                    <a href="/delete/<?= $makanan['id'] ?>" class="btn btn-outline-danger mb-2">Delete</a>
                    <br>
                    <a href="/makanan" class="link-underline-light">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    function reloadPage() {
        location.reload();
    }
</script>

<?= $this->endSection(); ?>