<?= $this->extend('template/FooHed'); ?>

<?= $this->section('content'); ?>

<form action="/create-review" method="post">
    
    <div class="rating">
        <input type="radio" name="rating1" id="star5" value="5">
        <label for="star5">☆</label>
        <input type="radio" name="rating1" id="star4" value="4">
        <label for="star4">☆</label>
        <input type="radio" name="rating1" id="star3" value="3">
        <label for="star3">☆</label>
        <input type="radio" name="rating1" id="star2" value="2">
        <label for="star2">☆</label>
        <input type="radio" name="rating1" id="star1" value="1">
        <label for="star1">☆</label>
    </div>
    <button type="submit">Submit Rating</button>
</form>

<?= $this->endSection(); ?>