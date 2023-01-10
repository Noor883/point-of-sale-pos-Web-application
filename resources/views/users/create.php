<a href="/users" class="btn btn-danger ">BACK 
<i class="bi bi-file-person-fill"></i>
</a>


<form action="/users/store" method="POST" class=" container w-50">
    <div class="mb-3">
       
        <h1 class="text-center text-success">Create User
        <i class="bi bi-file-person-fill"></i>
        </h1>
       

        <label for="display-name" class="form-label">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="display_name">
    </div> 
     <div class="mb-3">
        <label for="user-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-email" name="username">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="user-email" name="email">
    </div>
    
    <div class="mb-3">
        <label for="user-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password-email" name="password">
    </div>  
    <select class="form-select" aria-label="Default select example" name="role">
  <option value="admin">admin</option>
  <option value="seller">seller</option>
  <option value="procurment">procurment</option>
  <option value="accountant">accountant</option>
</select><div>
    <button type="submit" class="btn btn-success w-25 mt-4">Create</button>
    <a href="/users" class="btn btn-danger ms-3 mt-4">Cancel</a></div>
</form>