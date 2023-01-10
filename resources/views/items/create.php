<h1  class="text-center">Create Item
<i class="bi bi-phone-vibrate"></i>
</h1>

<a href="/items" class="btn btn-danger">BACK  <i class="bi bi-phone-vibrate"></i> </a>

<div class="container d-flex justify-content-center">
<form action="/items/store" method="POST" class="w-50">

    <div class="mb-3">
        <label for="item-title" class="form-label">Item_Name</label>
        <input type="text" class="form-control" id="item-title" name="item_name" >
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">Item_Cost</label>
        <input type="number" class="form-control" id="item-title" name="item_cost" >
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">price</label>
        <input type="number" class="form-control" id="item-title" name="buying_price" >
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="item-title" name="qty" >
    </div>
   
  
    <button type="submit" class="btn btn-success mt-4">Create</button>
    <a href="/items" class="btn btn-danger ms-3 mt-4">Cancel</a></div>
</form> </div>