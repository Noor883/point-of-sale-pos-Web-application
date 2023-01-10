<h1 class="text-center">Edit Transaction</h1>
<a href="" class="btn btn-danger">BACK</a>

<div class="container d-flex justify-content-center">

<form action="/transactions/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->transaction->id ?>">
    <div class="mb-3">
        <label for="transaction-title" class="form-label">Transaction Item</label>
        <input type="text" class="form-control" id="transaction-title" name="item_name" value="<?= $data->transaction->item_name ?>">
    </div>
    <div class="mb-3">
        <label for="transaction-title" class="form-label">Transaction Quantity</label>
        <input type="text" class="form-control" id="transaction-title" name="quantity" value="<?= $data->transaction->quantity ?>">
    </div>
    <div class="mb-3">
        <label for="transaction-title" class="form-label">Transaction Total</label>
        <input type="text" class="form-control" id="transaction-title" name="total" value="<?= $data->transaction->total ?>">
    </div>
    <div class="mb-3">
        <label for="transaction-title" class="form-label">Transaction Created At</label>
        <input type="text" class="form-control" id="transaction-title"  value="<?= $data->transaction->created_at ?>"disabled>
    </div>
    <div class="mb-3">
        <label for="transaction-title" class="form-label">Transaction Updated At</label>
        <input type="text" class="form-control" id="transaction-title" value="<?= $data->transaction->updated_at ?>"disabled>
    </div>
 
    <button type="submit" class="btn btn-warning mt-4">Update</button>
    <a href="./transaction" class="btn btn-danger ms-3 mt-4">Cancel</a></div>
</form></div>
