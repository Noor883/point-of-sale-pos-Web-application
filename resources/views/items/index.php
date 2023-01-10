   
   
    <a href="items/create" class="btn btn-primary justify-content-end">add 
    <i class="bi bi-phone-fill"></i>
    </a>
   <h1 class="d-flex justify-content-around">Items List (<?= $data->items_count ?>)</h1>
  
  
    <div class="row my-5">
        <?php foreach ($data->item as $item) : ?>
            <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-bolder">
                        <?= $item->item_name ?>
                        </h5> <hr>
                        <p class="card-title text-center">
                          ITEM Cost:  <?= $item->item_cost ?>
                        </p>                       
                         <p class="card-title text-center">
                        Buying Price : <?= $item->buying_price ?>
                        </p>

                         <p class="card-title text-center">
                          ITEM Quantity : <?= $item->qty ?>
                        </p>
                        <div class="d-flex mb-1   justify-content-center align-items-center">
                            <a href="./items/edit?id=<?= $item->id ?>" class=" m-1 btn btn-warning">edit </a>
                            <a href="./items/delete?id=<?= $item->id ?>" class=" m-1 btn btn-danger">delete </a>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    