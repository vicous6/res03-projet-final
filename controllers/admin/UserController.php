<?php

// require 'AbstractController.php';
// require 'managers/UserManager.php';

class UserController extends AbstractAdminController {
    

 public function __construct()
    {
        
    }
      public function AllUsers(){
          
           $userManager = new UserManager();
           $users = $userManager->getAllUsers();
          
           $this->renderAdmin( "admin-user" , ["users"=>$users]); 
      
        
    }
    public function deleteUser($id){
        
        $categoryManager = new UserManager();
       
             $action = $categoryManager->deleteUserById($id);
            //  echo $route[2];
             header('Location: /res03-projet-final/admin/utilisateurs');
             
    }
    
}