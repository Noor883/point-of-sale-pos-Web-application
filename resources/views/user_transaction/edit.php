<h1>Edit User_transaction</h1>

<form action="/user_transactions/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->user_transaction->id ?>">
    <div class="mb-3">
        <label for="user_transaction_name" class="form-label">User_transaction Name</label>
        <input type="text" class="form-control" id="user_transaction_name" name="name" value="<?= $data->user_transaction->name ?>">
    </div>
    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>