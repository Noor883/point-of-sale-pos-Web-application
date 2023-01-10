    <h1 class="d-flex justify-content-around">User_Transactions List (<?= $data->tags_count ?>)</h1>

    <div class="row my-5">

        <?php foreach ($data->user_transactions as $transaction) : ?>
            <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <?= $User_transaction->name ?>
                        </h5>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="./user_transaction?id=<?= $user_transactions->id ?>" class="btn btn-primary">Check Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>