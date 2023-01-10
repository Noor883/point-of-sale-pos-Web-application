<?php

namespace Core\Controller;
use Core\Helpers\Helper;
use Core\Base\Controller;
use Core\Base\view;
use Core\Model\User;


class profile extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }



  public function index()
  {
        
        $this->view= 'profile';
      
        $user=new User;
   
      $this->data['item']=$user->get_by_id($_SESSION["user"]["user_id"]);

  }

  

  public function update(){
      $user = new User();
        //* UPDATE THE POST 
        $this->xss($_POST);
        $user->profile($_POST);
        //* REDIRECT 
        
        Helper::redirect('/profile?id=' . $_POST['id']);
}
}
