
    <div class="d-flex justify-content-between">
        <h1>HTU POS System</h1>
        <div>
            <strong>Total Sales</strong>
            <span id="total-sales">0</span>
        </div>
    </div>
    <hr>

    <form id="userInputContainer" class="my-4 d-flex justify-content-between">

    <input type="hidden" id="id" value="<?= $_SESSION['user']['user_id'] ?>">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Items</span>
            <select id="items" class="form-select" aria-label="Default select example">

            </select>   
        </div>

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Quantity</span>
            <input id="quantity" type="number" class="form-control" aria-describedby="addon-wrapping" min="0">
        </div>

        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Price (JOD)</span>
            <input id="price" type="number" class="form-control" aria-describedby="addon-wrapping" min="0">
        </div>

        <button id="add-item" class="btn btn-success w-25">Add</button>
        <!-- <button id="edit-item" class="btn btn-success w-25">edit</button> -->
        <!-- <td><a href="./users/edit?id=<?= $transaction->id ?>" class="btn btn-warning">edit</a></td>
           <td><a href="./users/delete?id=<?= $transaction->id ?>" class="btn btn-danger">delete</a></td> -->
    </form>



    <div id="dataTableContainer">


        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price Per Unit</th>
                    <th scope="col">Total</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody id="selling_table">

            </tbody>
        </table>

        
    </div>
    
    <div>
    <!-- <button id="get-posts">Get Transactions</button>
    <button id="create-post">Create Transactions</button>
     </div>
    <div>
    <form id="transactions_form">
        <input id="form-user-id" type="hidden" name="user_id" value="1">
        <input id="form-title" type="text" name="title">
        <textarea id="form-content" name="content" cols="30" rows="10"></textarea>
    </form>
</div>

<div id="transactions-container"> -->

</div>




    
    <!-- $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}); 
      this search on table wiyh convert char to lower case  -->