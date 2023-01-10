<?php

namespace Core\Controller;
use Core\Base\Controller;
use Core\Helpers\Tests;
use Core\Model\Transaction;
use Core\Model\item;
use Exception;


class selling extends Controller
{
  public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }
    
        function index ()
        {
            $this->view = "selling.show";
        }

        //     // public function store()
        // {
        //     //$this->permissions([transaction:create']);
        //     $transaction = new Transaction();       // sure found because  function permission content  function auth content if (! issest (session [user]) work redirect on login 
        //     $_POST['user_id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the transaction creator would be the same logged in user.
        //     $transaction->create($_POST);
        //     Helper::redirect('/transactions');
        // }

         function create  ()
         {
            $this->view = "selling.create";
         }

        // function edit ()
        // {
        //     $this->view = "selling.edit";
        // }

        // function delete  ()
        // {
        //     $this->view = "selling.delete";
        // }
        //   function single()
        //  {
        //   $this->view = 'selling.single';
        // //  $transaction = new Transaction();
        // // $this->data['transaction']=$transaction->get_by_id($_GET['id']);
        //  }
   //     $selected_transaction = $transaction->get_by_id($_GET['id']); // get the transaction data (including the user_id)
        //         $user = new User(); // get the user model to get the author info
        //         $author = $user->get_by_id($selected_post->user_id); // get the author by using the user_id in the $selected_transaction
        //         $selected_transaction->author = !empty($author) ? $author->display_name : null; // check if we got a user withe the provided user_id

        //         $date = new \DateTime($selected_transaction->created_at);
//                 $selected_transaction->created_at = $date->format('d/m/Y');
}






   