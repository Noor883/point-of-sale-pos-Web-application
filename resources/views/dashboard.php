<div class="row  container  flex-wrap  align-content-align-items-center justify-content-center col-12 mb-3" >


<div class="row w-100 d-flex ">

<div class="col-2 d-flex  w-25 mb-3">
        <div class="card"  style="width: 18rem ;">
          
            <div class="card-body fw-bolder back1">
                <h3 class="card-text">TOTAL USERS</p>
                <h5 class="card-text"><?=$data->users_count ?></p>
            </div>
        </div>
</div>


    
        <div class="col-2 w-25 d-flex mb-3">
            <div class="card"  style="width: 18rem;">
              
                <div class="card-body fw-bolder back3">
                <h3 class="card-text">TOTAL ITEMS</h3>
                    <h5 class="card-text"><?=$data->items_count ?></h5>
                </div>
            </div>
        </div>





        

        <div class="col-2 w-25 d-flex mb-3">
            <div class="card" style="width: 20rem;">
              
                <div class="card-body fw-bolder back3 ">
                    <h3 class="card-text">TOTAL TRANSACTIONS</h3>
                    <h5 class="card-text"><?=$data->transactions_count ?></h5>
                </div>
            </div>
        </div>

        <div class="col-2 w-25 d-flex mb-3">
            <div class="card" style="width: 20rem;">
              
                <div class="card-body fw-bolder back3 ">
                <h3 class="card-text">TOTAL SALES</h3>
                    <h5 class="card-text"><?=$data->sum_sales?></h5>
                </div>
            </div>
        </div>

    
       

</div> 

<div class="top"  style="    opacity:0.7;" ></div>
  <h1 class="text-center">top five </h1>
<ul class="list-group w-50 ">
<?php       
  foreach ($data->top as $TOP) : ?>
  <li class="list-group-item gap-2"><span>NAME : <?= $TOP->item_name?></span><br><span class=""> PRICE : <?= $TOP->buying_price?> </span> </li>
<?php
endforeach;?>
</ul>
<br>
  </div>

   

