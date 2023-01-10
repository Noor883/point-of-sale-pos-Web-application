<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\item;
use Core\Model\Tag;

class items extends Controller
{
    use Tests;
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
     * Gets all items
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['item:read']);
        $this->view = 'items.index';
        $item = new item; // new model item.
        $this->data['item'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }

    public function single()
    {
        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");
        $this->permissions(['item:read']);
        $this->view = 'items.single';
        $item = new Item();
        $this->data['item'] = $item->get_by_id($_GET['id']);
        // escape XSS attacks
        $this->xss($_POST);
       // $selected_item->content = \htmlspecialchars($selected_item->content);

   
    }


    /**
     * Display the HTML form for item creation
     *
     * @return void
     */
    public function create()
    {
      $this->permissions(['item:create']);
        $this->view = 'items.create';
    }

    /**
     * Creates new item
     *
     * @return void
     */
    public function store()
    { 
        $this->permissions(['item:create']);
        $item = new Item();
       // $_POST['user_id'] = $_SESSION['user']['user_id']; 
       $this->xss($_POST);
       $item->create($_POST);
         //Helper::redirect('/items');
        Helper::redirect('/items'. $_POST['id']);
    }

    /**
     * Display the HTML form for item update
     *
     * @return void
     */
    public function edit()
    {
       $this->permissions(['item:read', 'item:update']); 
        $this->view = 'items.edit';
        $item = new Item();
        //$user_transaction = new User_tramsaction();
         $item = $item->get_by_id($_GET['id']);
        // $selected_item = $item->get_by_id($_GET['id']);
        // $selected_item->User_transactions = $user_transaction->get_all();
        // $this->data['item'] = $selected_item;
        $this->data['item'] = $item;
    }

    /**
     * Updates the item
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['item:read', 'item:update']); 
        $item = new Item();

        // Handle items_tags relations
        // $item_id = $_POST['id'];
        // $related_user_transactions = $_POST['user_transagtions'] ?? null;
        // if (!empty($related_user_transactions)) {
        //     foreach ($related_user_transactions as $user_transaction_id) {
        //         $sql = "INSERT INTO items_user_transactions (item_id, user_transaction_id) VALUES ($item_id, $user_transaction_id)";
        //         $item->connection->query($sql);
        //     }
        // }
          // unset($_POST['user_transactions']);
          $this->xss($_POST);
        $item->update($_POST);
        Helper::redirect('/items');
    }

    /**
     * Delete the item
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['item:read', 'item:delete']);
        $item = new Item();
        $item->delete($_GET['id']);
        Helper::redirect('/items');
    }

    
}
