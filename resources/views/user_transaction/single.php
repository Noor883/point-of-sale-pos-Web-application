<?php

use Core\Helpers\Helper;
?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['user_transaction:read', 'user_transaction:update'])) : ?>
        <a href="/tags/edit?id=<?= $data->user_transaction->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['user:read', 'tag:delete'])) :
    ?>
        <a href="/user_transactions/delete?id=<?= $data->user_transaction->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
</div>

<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->user_transaction->name ?>
    </h1>
</div>