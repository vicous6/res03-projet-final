<?php

// require 'AbstractController.php';
// require 'managers/UserManager.php';

class ProductController extends AbstractController {
    
    
  private ProductManager $productManager;

 public function __construct()
    {
        
        
        $this->productManager= new ProductManager()  ;
    
       
        
    }
    
   
    public function allProducts(){
         $productManager = new ProductManager()  ;
       $all=   $productManager->getAllProducts();
        // $objAll= new Product()
        $this->renderPublic( "products" , [$all]); 
    }
    public function allProductsByCategory($routeName){
        
            $productManager = new ProductManager()  ;
         var_dump($routeName);
       $all=   $productManager->getProductByCategory($routeName);
        $this->renderPublic( "productsCategory" , [$all]); 
    }
    public function ProductById(string $routeId){
        
         $productManager = new ProductManager()  ;
         var_dump($routeId);
       $all=   $productManager->getProductById($routeId);
        $this->renderPublic( "product" , [$all]); 
    }
}