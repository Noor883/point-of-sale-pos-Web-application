<div class="my-5">
    <!-- for public -->
    <h1 class="text-center mb-5">
        <?= $data->item->title ?>
    </h1>

    <?php if (!empty($data->transaction->author)) : ?>
        <p class="mb-3">
            Author: <?= $data->transaction->author ?>
        </p>
    <?php endif; ?>

    <p class="mb-3">
        Created: <?= $data->item->created_at ?>
    </p>

    <p>
        <?= $data->item->content ?>
    </p>
</div>