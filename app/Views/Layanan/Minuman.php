<?= $this->extend('template/FooHed'); ?>

<?= $this->section('content'); ?>

<br>
<div class="container" id="myDivs" style="display: none;">
    <div class="row">
        <div class="col">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($Minumans as $m) : ?>
                <div class="card mb-3 ms-3" style="max-width: 355px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/<?= $m['image']; ?>" class="img-fluid rounded-start" alt="test">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $m['nama_minuman']; ?></h5>
                                <p class="card-text"><?= $m['deskripsi']; ?></p>
                                <p class="card-text"><small class="text-body-secondary">
                                    Dibuat Pada Tanggal : <br>
                                    <?= $m['created_at']; ?>
                                </small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>