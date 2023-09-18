<?= $this->extend('template/FooHed'); ?>

<?= $this->section('content'); ?>
<br>

<div class="container" id="myDivs" style="display: none;">
    <a class="btn btn-danger mx-auto mb-3" href="/tambahmakanan">Create</a>
    <div class="row">
        <div class="col">
            <!-- <div class="row row-cols-3 row-md-1 g-4"> -->
            <div class="row">
                <?php foreach ($makanan as $ms) : ?>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <!-- Card-->
                        <div class="card rounded shadow-sm border-0" style="max-height: 100%; min-height: 100%; overflow: hidden;">
                            <div class="card-body p-4">
                                <img src="/img/<?= $ms['image']; ?>" style="max-width: 40%;" class="img-fluid d-block mx-auto mb-3">
                                <h5> <a href="/makanan/<?= $ms['slug']; ?>" class="text-dark"><?= $ms['nama_makanan']; ?></a></h5>
                                <!-- <h5> <a href="/detailmakanan" class="btn btn-primary">Details</a></h5> -->
                                <div style="max-height: 60px; overflow: hidden;">
                                    <p class="small text-muted font-italic"><?= $ms['deskripsi']; ?></p>
                                </div>
                                <ul class="list-inline small">
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-success"></i></li>
                                    <div class="rating">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <span class="star" data-rating="<?= $i; ?>" data-makanan-id="<?= $ms['id']; ?>">☆</span>
                                        <?php endfor; ?>
                                    </div>
                                    <a href="/rate" class="mx-5">Rate</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

            <!-- </div> -->
        </div>
    </div>
</div>

<script>
    function reloadPage() {
        location.reload();
    }
</script>


<?= $this->endSection(); ?>