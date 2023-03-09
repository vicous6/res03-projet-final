<?php

// require 'AbstractController.php';
// require 'managers/UserManager.php';

class ProductAdminController extends AbstractAdminController {
    
    
  private ProductManager $productManager;

 public function __construct()
    {
        
        
        $this->productManager= new ProductManager()  ;
    
       
        
    }
    
}