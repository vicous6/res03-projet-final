<?php 
// require 'controllers/UserController.php';
// require 'controllers/PageController.php';


class Router {

    // private attribute
    
    private PageController $pageController;
     private ProductController $productController;

  


    // public constructor
    public function __construct()
    {
       
        $this->pageController = new PageController();
        $this->productController = new ProductController();

    }

    public function checkRoute(){
    

        if(isset($_GET["path"])){
            
            $route = explode("/",$_GET["path"]);
            
            // PageController
            if($route[0]=== "accueil"){
                $this->pageController->homepage();
            }
            if($route[0]=== "contact"){
                $this->pageController->contact();
            }
            if($route[0]=== "aPropos"){
                $this->pageController->aPropos();
            }
            if($route[0]=== "login"){
                $this->pageController->login();
            }
            if($route[0]=== "register"){
                $this->pageController->register();
            }
            
            
            //ProductController
            
            if($route[0]=== "produits"){
                
                // je n'ai que /produit
                if(!isset($route[1])){
                    
                    $this->productController->allProducts();
                }else if(isset($route[1]) && !isset($route[2])){
                    
                    $this->productController->allProductsByCategory($route[1]);
                    
                }
                
                
            }
            if($route[0]=== "produit"){
                
                // je n'ai que /produit
                if(!isset($route[1])){
                    
                    $this->productController->allProducts();
                }else if(isset($route[1])){
                    
                    $this->productController->ProductById($route[1]);
                    
                }
                
                
            }
            
      
        
        
    }

}
    
    
}
?>





