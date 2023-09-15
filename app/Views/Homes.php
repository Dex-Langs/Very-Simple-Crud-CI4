<?= $this->extend('template/FooHed'); ?>


<?= $this->section('content'); ?>

<br>
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="card" id="myDivs" style="display: none;">
                <div class="card-header">
                    Layanan Test
                    <span class="card-text-center">
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Ini Layanan Home</h5> -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>