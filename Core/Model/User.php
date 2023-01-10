<?php

namespace Core\Model;

use Core\Base\Model;


// User Class: Moadel class to manage the website users
 

class User extends Model
{

    const ADMIN = array(
        "item:read", "item:create", "item:update", "item:delete",
        "user:read", "user:create", "user:update", "user:delete",
        "transaction:read", "transaction:create","transaction:update", "transaction:delete",
        "user_transactions:read", "user_transactions:create", "user_transactions:update", "user_transaction:delete"
    );

    const SELLER = array( 
        "transaction:read", "transaction:create", "transaction:delete",
        // "profile:read", "profile:create",
        "user_transactions:read", "user_transactions:create", "user_transaction:update"
    );
    const PROCURMENT = array(
        "item:read", "item:create","item:update", "item:delete", 
         "profile:read", "profile:create",
    );
    const ACCOUNTANT = array(
        "transaction:read", "transaction:create", "transaction:update", "transaction:delete",
    );

    public function check_username(string $username)
    {
        $result = $this->connection->query("SELECT * FROM $this->table WHERE username='$username'");
        if ($result) {         // if there is an error in the connection or if there is syntax error in the SQL.
            if ($result->num_rows > 0) {
                return $result->fetch_object();
            } else {
                 //var_dump(check_username);
                die;
                //return false;
            }
        } else {
            return false;
        }
    }
    //this permision check
  public function get_permissions(): array
 {
    $permissions = array();  // var_dump($permissions);
    $user = $this->get_by_id($_SESSION['user']['user_id']);
    if ($user) {
        // $permissions = \explode(',', $user->permissions);
        //this  serilalize (generates astrongable representation of a value ) here array convert value role to value permission from string to array . 
        $permissions = \unserialize($user->permissions);
    }
    return $permissions;
 }
}