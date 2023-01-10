<?php

namespace Core\Controller;
use Core\Model\item;
use Core\Model\Transaction;
use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;



class Admin extends Controller
{
    public function render()
    {
        if (!empty($this->view)) {
            $this->view();
        }
    }

    public function __construct()
    {
        $this->auth();
        $this->admin_view(true);
    }

    public function index()
    {
        $this->view = 'dashboard';
        $user = new User();
        $this->data['users_count'] = count($user->get_all());

        $items = new item();
        $this->data['items_count'] = count($items->get_all());
        $this->data['top'] = ($items->Top());
        $transactions = new transaction();
        $this->data['transactions_count'] = count($transactions->get_all());
        $total=$transactions->sum_sales();
        $this->data['sum_sales'] = $total[0];

        
    }
}