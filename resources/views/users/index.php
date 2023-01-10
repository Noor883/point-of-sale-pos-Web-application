<h1 class="d-flex justify-content-around mb-5">
    Users List (<?= $data->users_count ?>)</h1>
<a href="./users/create" class="btn btn-primary mb-5">Add
<i class="bi bi-file-person-fill"></i>
</a>

<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Display Name</th>
                <th scope="col">user Name</th>
                <th scope="col">email</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->users as $user) : ?>
                <tr>
                    <td><?= $user->display_name ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->created_at ?></td>
                    <td><?= $user->updated_at ?></td>
                    <td><a href="./users/edit?id=<?= $user->id ?>" class="btn btn-warning">update</a></td>
                    <td><a href="./users/delete?id=<?= $user->id ?>" class="btn btn-danger">delete</a></td>
                
                </tr>          
                <?php endforeach; ?>        
        </tbody>
    </table>

</div>