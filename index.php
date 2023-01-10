<?php
session_start();
use Core\Model\User;
use Core\Helpers\Fake;
use Core\Router;

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});
//***********===============cookie BREACH===============**** */
if (isset($_COOKIE['user_id']) && !isset($_SESSION['user'])) { // check if there is user_id cookie.
    // log in the user automatically
    $user = new User(); // get the user model
    $logged_in_user = $user->get_by_id($_COOKIE['user_id']); // get the user by id
    $_SESSION['user'] = array( // set up the user session that idecates that the user is logged in. 
        'username' => $logged_in_user->username,
        'display_name' => $logged_in_user->display_name,
        'user_id' => $logged_in_user->id,
        'is_admin_view' => true
    );
}


//===============================Login Form==============================================
Router::get('/', 'authentication.login'); // Display login.php
// For web administrators
Router::get('/logout', "authentication.logout"); // Logs the user out  
Router::post('/authenticate', "authentication.validate"); // athenticated
//===============================Login Form==============================================

//==============Admin dashboard==============
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard
//==============Admin dashboard==============


//this  single_page to api  
//Router::get('/dashboard', "selling.index"); // Displays the selling dashboard
//this  single_page to profile cv
 //permissions [profile:read, profile:create]
Router::get('/profile',"profile.index"); // Displays the profile cv Form
Router::post('/update/profile', "profile.update"); 
//Router::get('/profile',"profile.form.create");
//this  single_page to form to log profile 

// athenticated + permissions [item:read]
Router::get('/items', "items.index"); // list of items (HTML)
Router::get('/item', "items.single"); // Displays single itemt (HTML)
// athenticated + permissions [item:create]
Router::get('/items/create', "items.create"); // Display the creation form (HTML)
Router::post('/items/store', "items.store"); // Creates the items (PHP)
// athenticated + permissions [item:read, item:create]
Router::get('/items/edit', "items.edit"); // Display the edit form (HTML)
Router::post('/items/update', "items.update"); // Updates the items (PHP)
// athenticated + permissions [item:read, item:detele]
Router::get('/items/delete', "items.delete"); // Delete the item (PHP)


//====================================Transaction==================================================
// athenticated + permissions [transaction:read]
Router::get('/transactions', "transactions.index"); // list of transactions (HTML)
// athenticated + permissions [transaction:read, transaction:create]
Router::get('/transactions/edit', "transactions.edit"); // Display the edit form (HTML)
Router::post('/transactions/update', "transactions.update"); // Updates the transactions (PHP)
// athenticated + permissions [transaction:read, transaction:detele]
Router::get('/transactions/delete', "transactions.delete"); // Delete the transaction (PHP)
//====================================user_Transactions==================================================
// // athenticated + permissions [transaction:read]
// Router::get('/user_transactions', "user_transactions.index"); // list of user_transactions (HTML)
// // athenticated + permissions [transaction:read, transaction:create]
// Router::get('/user_transactions/edit', "user_transactions.edit"); // Display the edit form (HTML)
// Router::post('/user_transactions/update', "user_transactions.update"); // Updates the user_transactions (PHP)
// // athenticated + permissions [transaction:read, transaction:detele]
// Router::get('/user_transactions/delete', "user_transactions.delete"); // Delete the user_transaction (PHP)
//=========================================user_transaction========================================

// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single item (HTML)
// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the post (PHP)


//===============API==================
//  Router::get('', "sellers.show");
// Router::get('/api/posts', 'endpoints.s');
// Router::post('/api/posts/create', 'endpoints.posts_create');

//===============API==================/items/store
Router::get('/selling', "selling.index");            // list in api (HTML)
Router::get('/api/items', "sales.index");            //[user:create]// Display the creation form (HTML)
Router::post('/api/item', "sales.get_item");          // Creates the items(quantity,price )in transactions (PHP)

//Router::get('/api/items', "sales.transactions");
//Router::post('/api/item', "sales.get_transaction");



Router::post('/api/transactions', 'sales.transactions'); 
Router::get('/api/transactions/single', 'sales.transactions/single');
Router::get('/api/transactions/get', 'sales.get_transaction'); 
Router::post('/api/transactions/create', 'sales.Transaction_store');
Router::put('/api/transactions/update', 'sales.transactions_update');
Router::delete('/api/transactions/delete', 'sales.transactions_delete'); 
//===============API==================






Router::redirect();




