<h1 class="text-center">Welome to Our New Stock </h1>


<div class="row my-5">

    <?php foreach ($data->items as $item) : ?>
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <?= $item->title ?>
                    </h5>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="./front/post?id=<?= $item->id ?>" class="btn btn-primary">Check transaction</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>