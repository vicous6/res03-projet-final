<?php


class CategoryController extends AbstractAdminController {
    
    
//   private ProductManager $productManager;

 public function __construct()
    {
        
        
        // $this->productManager= new ProductManager()  ;
    }
       public function allCategories(){
           
           if(isset($_SESSION)&& $_SESSION["role"]=== "admin"){
                $categoryManager = new CategoryManager();
               $truc =  $categoryManager->getAllCategories();
               
                 $this->renderAdmin( "admin-category" , ["categories"=>$truc]); 
           }
           else{
               header('Location: /res03-projet-final/produits');
           }
       
        
    }
    
}