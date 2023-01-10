<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Users extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->auth();
                $this->admin_view(true);
        }

        /**
         * Gets all users
         *
         * @return array
         */
        public function index()
        { 
                $this->permissions(['user:read']); 
                $this->view = 'users.index';
                $user = new User; // new model.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
        }

        public function single()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.single';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        // escape XSS attacks
            $selected_user->content = \htmlspecialchars($selected_user->content);

        
        }
        /**
         * Display the HTML form for item creation
         *
         * @return void
         */
        public function create()
        {
               $this->permissions(['user:create']);
                $this->view = 'users.create';
        }


        public function store()
        {
         $this->permissions(['user:create']);
        $user = new User();
        //$_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);// encapution on password

        //Helper::redirect('/users');

        $permissions = null;  
        switch ($_POST['role']) {
        case 'admin':
            $permissions = User::ADMIN;
            break;

        case 'SELLER':
            $permissions = User::SELLER;
            break;
        case 'procurement':
            $permissions = User::PROCURMENT;
            break;

        case 'Accountant':
            $permissions = User::ACCOUNTANT;
            break;
    }
         unset($_POST['role']);
          //$_POST['permissions'] = implode(',', $permissions);
        $_POST['permissions'] = \serialize($permissions);
        $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
        $this->xss($_POST);
        $user->create($_POST);
        Helper::redirect('/users');
}
        /**
         * Display the HTML form for item update
         *
         * @return void
         */
        public function edit()
        {
                $this->permissions(['user:read', 'user:update']);
                $this->view = 'users.edit';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }
                        
        /**
         * Updates the item                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
         *
         * @return void
         */
        public function update()
        {
                $this->permissions(['user:read', 'user:update']);
                $user = new User();
                // process role
                $permissions = null;
                switch ($_POST['role']) {
                        case 'admin':
                                $permissions = User::ADMIN;
                                break;

                        case 'SELLER':
                                $permissions = User::SELLER;
                                break;
                         case 'procurement':
                               $permissions = User::PROCURMENT;
                                 break;      
                         case 'Accountant':
                               $permissions = User::ACCOUNTANT;
                               break;
                }            

                unset($_POST['role']);
                //$_POST['permissions'] = implode(',', $permissions);
                $_POST['permissions'] = \serialize($permissions);       //here array convert value role to value permission to as string .  in user reverse for string to array use unserialize
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $this->xss($_POST);
                $user->update($_POST);
                Helper::redirect('/users?id='. $_POST['id']);
        }

        

        /**
         * Delete the item
         *
         * @return void
         */
        public function delete()
        {
                $this->permissions(['user:read', 'user:delete']);
                $user = new User();
                $user->delete($_GET['id']);
                Helper::redirect('/users');
        }
}
