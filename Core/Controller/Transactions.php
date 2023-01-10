<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Model\Transaction;

class Transactions extends Controller
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
     * Gets all transactions
     *
     * @return array
     */
    public function index()
    {
         $this->permissions(['transaction:read']); 
        $this->view = 'transaction.index';
        $transaction = new transaction; // new model transaction.
        $this->data['transaction'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
    }
/**
     * Creates new transactionfrom pos stock
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['transaction:create']);
        $transaction = new transaction();
    // escape XSS attacks
      $selected_transaction->content = \htmlspecialchars($selected_transaction->content);
        $_POST['user_id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the post creator would be the same logged in user.
        $this->xss($_POST);
        $transaction->create($_POST);
        Helper::redirect('/transactions');

    }

    /**
     * Display the HTML form for transaction update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['transaction:read', 'transaction:update']);
        $this->view = 'transaction.edit';
        $transaction = new Transaction ();
        $selected_transaction= $transaction->get_by_id($_GET['id']);
        $this->data['transaction'] = $selected_transaction;
    }

    /**
     * Updates the transaction
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['transaction:read', 'transaction:update']);      $transaction = new Transaction();

        $this->xss($_POST);
        $transaction->update($_POST);
        Helper::redirect('/transactions');
    }

    /**
     * Delete the transaction
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['transaction:read', 'transaction:delete']);
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/transactions');
    }
}
