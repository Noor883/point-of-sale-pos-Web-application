<?php

namespace Core\Controller;
use Core\Base\Controller;
use Core\Model\Transaction;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\item;
use DateTime;


class sales extends Controller
{ 
    use Tests;
    
    protected $request_body;
    protected $http_code = 200;

    protected $response_schema = array(
        "success" => true,         // to provide the response status.
        "message_code" => "", // to provide message code for the front-end developer for a better error handling
        "body" => array()
    );


    public function __construct()
    {
        $this->auth();
        $this->request_body = (array) json_decode(file_get_contents("php://input"));
    }

    public function render()
    {
        header("content-type: application/json");// changes the header information
        http_response_code($this->http_code);       //set the HTTP Code for the response
        echo json_encode($this->response_schema);    // convert the data to json format
    }

    /**read
     * GET THE ALL ITEMS
     * 
     * @return array
     */
    public function index()
    {
        try {
            $items =new item();
            $result = $items->get_all();
            if (!$result) {
                $this->http_code = 500;
                throw new \Exception("Sql_response_error");
            } else {
                $this->response_schema['body'] = $result;
                $this->response_schema['message_code'] = "items_collected_successfully";
            }
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }

        /**create
     * GET THE ALL ITEMS
     * 
     * @return array
     */
    public function get_item()
    {
        try {
            $items =new item();
            $result = $items->get_by_id($this->request_body['id']);
            if (!$result) {
                $this->http_code = 500;
                throw new \Exception("Sql_response_error");
            } else {
                $this->response_schema['body'] = $result;
                $this->response_schema['message_code'] = "items_collected_successfully";
            }
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }

    //***********this index transaction****** (crud operation )*******
    //***************
     public function transactions()
     {
         try {
             $transaction = new Transactions();
             $result = $transactions->get_all();
             if ($result) {
                $this->http_code = 500;
                 throw new \Exception("Sql_response_error");
             }
             $this->response_schema['body'] = $result;
             $this->response_schema['message_code'] = "transactions_collected_successfuly";
         } catch (\Exception $error) {
             $this->response_schema['success'] = false;
             $this->response_schema['message_code'] = $error->getMessage();
             $this->http_code = 404;
         }
     }

//***********this create transaction*******

public function get_transaction()
{
    try {
        $transactions =new transaction();
        $result = $transactions->get_all();
        if (!$result) {
            $this->http_code = 500;
            throw new \Exception("Sql_response_error");
        } else {
            $this->response_schema['body'] = $result;
            $this->response_schema['message_code'] = "transactions_collected_successfully";
        }
    } catch (\Exception $error) {
        $this->response_schema['success'] = false;
        $this->response_schema['message_code'] = $error->getMessage();
    }
}   
        
    public function Transaction_store()
    {
    try {
        $transaction = new Transaction();
        $transaction->create($this->request_body);

        // $Transaction_id = $transaction->get_by_id($transaction->connection->insert_id);
        // $Transaction_id = $transaction_id->id;
        // $user_id = $this->request_body['user_id'];

        // $this->transaction->query("INSERT INTO user_transactions (user_id,transaction_id) VALUES ($user_id,$Transaction_id)");

        $this->response_schema['message_code'] = "transaction_created_successfuly";
    } catch (\Exception $error) {
        $this->response_schema['message_code'] = "transaction_was_not_created";
        $this->http_code = 421;
    }
}


         public function Transaction_update()
         {
             self::check_if_empty($this->request_body);
             try {
                 $transaction = new Transaction();
                 $item = new Item();
                $current_item= $item->get_by_id($_POST['id']);
                $current_item->quantity = request_body->quantity;
                $item->update($current_item);
                //  $transaction->update($this->request_body);
                 $this->response_schema['message_code'] = "transaction_update_successfuly";
             } catch (\Exception $error) {
                 $this->response_schema['message_code'] = "transaction_was_not_update";
                 $this->http_code = 421;
             }
         }
//this delete transaction

         public function transactions_delete()
         {
             self::check_if_empty($this->request_body);
             try {
                 $transaction = new Transaction();
                 $item = new Item();
                 $current_item= $item->get_by_id($_POST['id']);
                 $current_item->quantity = request_body->quantity;
                 $item->delete($current_item);

                 $transaction->delete($this->request_body);
                 $this->response_schema['message_code'] = "transaction_deleted_successfuly";
             } catch (\Exception $error) {
                 $this->response_schema['message_code'] = "transaction_was_not_deleted";
                 $this->http_code = 421;
             }
         }

          public function submit_query($sql)
          {
              return $this->connection->query($sql);
          }
}                                                                           