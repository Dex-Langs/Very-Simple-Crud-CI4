<?= $this->extend('template/FooHed'); ?>

<?= $this->section('content'); ?>

<br>
<div class="container" id="myDivs" style="display: none;">
    <div class="row">
        <div class="col">
            <div class="row">
                <?php foreach ($Minumans as $m) : ?>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <!-- Card-->
                        <div class="card rounded shadow-sm border-0" style="max-height: 100%; min-height: 100%; overflow: hidden;">
                            <div class="card-body p-4">
                                <div class="text-center mb-3">
                                    <img src="img/<?= $m['image']; ?>" style="max-width: 50%;  " class="img-fluid">
                                </div>
                                <h5 class="text"> <a href="/makanan/<?= $m['slug']; ?>" class="text-dark"><?= $m['nama_minuman']; ?></a></h5>
                                <!-- <h5 class="text-center"> <a href="/detailmakanan" class="btn btn-primary">Details</a></h5> -->
                                <div style="max-height: 60px; overflow: hidden;">
                                    <p class="small text-muted font-italic"><?= $m['deskripsi']; ?></p>
                                </div>
                                <ul class="list-inline small text-center">
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-success"></i></li>
                                </ul>
                                <div class="rating text-center">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <span class="star" data-rating="<?= $i; ?>" data-makanan-id="<?= $m['id']; ?>">☆</span>
                                    <?php endfor; ?>
                                </div>
                                <div class="text-center">
                                    <a href="/rate">Rate</a>
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