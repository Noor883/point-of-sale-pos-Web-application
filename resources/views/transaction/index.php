
<h1 class="d-flex justify-content-around mb-5">Transactions List(<?= $data->transactions_count ?>) </h1>
<a href="" class="btn btn-danger">BACK</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">item name</th>
      <th scope="col">quantity</th>
      <th scope="col">total</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody> 
     <?php foreach ($data->transaction as $transaction) : ?>
    <tr>
    <td><?= $transaction->id ?></td>
    <td><?= $transaction->item_name ?></td>
    <td><?= $transaction->quantity ?></td>
    <td><?= $transaction->total ?></td>
    

   <!-- <td> <button class="btn btn-danger">delete</button></td>-->
    
   <!-- <td><button class="btn btn-warning">edit</button></td>    this here will be edit or delet transaction -->
    
  <td><a href="/transactions/edit?id=<?= $transaction->id ?>" class="btn btn-primary">update</a></td>
  <td><a href="./transactions/delete?id=<?= $transaction->id ?>" class="btn btn-danger">delete</a></td>
    
   

    <!--<td> <button class="btn btn-warning"><i class="fa fa-check" aria-hidden="true"></i></button></td>-->
    <?php endforeach; ?>

   

  </tbody>
</table>