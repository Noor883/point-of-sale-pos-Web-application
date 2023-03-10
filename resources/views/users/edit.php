<h1 class="text-center">Edit User
<i class="bi bi-file-person-fill"></i> 
</h1>

<a href="/users" class="btn btn-danger">BACK</a>
<div class="container d-flex justify-content-center">

<form action="/users/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->user->id ?>">
    <div class="mb-3">
        <label for="display-name" class="form-label">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="display_name" value="<?= $data->user->display_name ?>">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="user-email" name="email" value="<?= $data->user->email ?>">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-email" name="username" value="<?= $data->user->username ?>">
    </div>
    <div class="mb-3">
        <label for="user-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="user-password" name="password" value="<?= $data->user->password ?>">
    </div>
    <div class="mb-3">
        <label for="user-role" class="form-label">Role</label>
        <select class="form-select" aria-label="Role" name="role">
            <option value="admin">Admin</option>
            <option value="seller">Seller</option>
            <option value="procurement">procurement</option>
            <option value="Accountant">Accountant</option>
        </select>
    </div>
    <button type="submit" class="btn btn-warning mt-4">Update
    <i class="bi bi-file-person-fill"></i>
    </button>
    <a href="/users" class="btn btn-danger ms-3 mt-4">Cancel</a>

</form></div>