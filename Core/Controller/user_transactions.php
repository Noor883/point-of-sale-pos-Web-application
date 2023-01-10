<?php

namespace Core\Controller;

use Core\Base\Controller;


class user_transactions extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function index()
        {
         //echo '1';
         $this->view = 'user_transaction.index';

       $user_transaction = new user_transaction; // new model transaction.
        $this->data['user_transaction'] = $user_transaction->get_all();
        $this->data['user_transaction_count'] = count($user_transaction->get_all());
    
        }
      
        public function single()
        {
          //  $this->permissions(['user_transactions:read']);
            $this->view = 'user_transactions.single';
            $user_transaction = new User_transaction();
            $this->data['user_transaction'] = $user_transaction->get_by_id($_GET['id']);
        }
    
        /**
         * Display the HTML form for user_transaction creation
         *
         * @return void
         */
        public function create()
        {
           // $this->permissions(['user_transaction:create']);
            $this->view = 'user_transaction.create';
        }
    
        /**
         * Creates new user_transaction
         *
         * @return void
         */
        public function store()
        {
            //$this->permissions(['user_transaction:create']);
            $user_transaction = new User_transaction();
            $_POST['user_id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the transaction creator would be the same logged in user.
            $user_transaction->create($_POST);
            Helper::redirect('/user_transactions');
        }
    
        /**
         * Display the HTML form for user_transaction update
         *
         * @return void
         */
        public function edit()
        {
            //$this->permissions(['user_transaction:read', 'user_transaction:update']);
            $this->view = 'user_transaction.edit';
            $user_transaction = new User_transaction ();
            $selected_user_transaction= $user_transaction->get_by_id($_GET['id']);
            $this->data['user_transaction'] = $selected_user_transaction;
        }
    
        /**
         * Updates the user_transaction
         *
         * @return void
         */
        public function update()
        {
            $this->permissions(['user_transaction:read', 'user_transaction:update']);
            $user_transaction = new User_transaction();
    
          
            $user_transaction->update($_POST);
            Helper::redirect('/user_transactions');
        }
    
        /**
         * Delete the transaction
         *
         * @return void
         */
        public function delete()
        {
            $this->permissions(['user_transaction:read', 'user_transaction:delete']);
            $user_transaction = new User_transaction();
            $user_transaction->delete($_GET['id']);
            Helper::redirect('/user_transactions');
        }
    }

