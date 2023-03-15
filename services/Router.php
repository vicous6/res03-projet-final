<?php 

class Router {

    // private attribute
    
    private PageController $pageController;
    private UserController $userController;
    private CategoryController $categoryController;
    private ImageController $imageController;
    private OrderController $orderController;
     private ProductPublicController $productPublicController;
     private ProductAdmincController $productAdminController;
       private LoginController $loginController;

  


    // public constructor
    public function __construct()
    {
       
        $this->pageController = new PageController();
        $this->userController = new UserController();
        $this->categoryController = new CategoryController();
        $this->imageController = new ImageController();
        $this->orderController = new OrderController();
        $this->productPublicController = new ProductPublicController();
        $this->ProductAdmincController = new ProductPublicController();
         $this->loginController = new LoginController();
    }

    public function checkRoute(){
    

        if(isset($_GET["path"])){
            // var_dump($_GET["path"]);
            $route = explode("/",$_GET["path"]);
            
            // Pages publics gerer par -> PageController
            if($route[0]=== "accueil"){
                $this->pageController->homepage();
            }
            if($route[0]=== "contact"){
                $this->pageController->contact();
            }
            if($route[0]=== "aPropos"){
                $this->pageController->aPropos();
            }
            if($route[0]=== "monPanier"){
                $this->pageController->monPanier();
            }
            if($route[0]=== "logout"){
                $this->pageController->logout();
            }
            if($route[0]=== "login"){
                 if (!empty($_POST) && $_POST["formName"]=== "login"){
                    $post = $_POST;
                    //  $_POST = array();
                     $this->loginController->auth($post);
                }else{
                
                $this->pageController->login();
            }
            }
            if($route[0]=== "register"){
                 
                if (!empty($_POST) && $_POST["formName"]=== "register"){
                    $post = $_POST;
                    //  $_POST = array();
                     $this->pageController->registerCreateUser($post);
                }else{
                
                $this->pageController->register();
            }
            }
            
            //ProductPublicController
            
            if($route[0]=== "produits"){
                
                // je n'ai que /produit
                if(!isset($route[1])){
                    
                    $this->productPublicController->allProducts();
                }else if(isset($route[1]) && !isset($route[2])){  // exemple produits/collier
                    
                    $this->productPublicController->allProductsByCategory($route[1]);
                    
                }
                
                
            }
            //ProductPublicController
            if($route[0]=== "produit"){
                
                // je n'ai que /produit
                if(isset($route[1])){ // exemple produit/11
                
                    
                    
                    $this->productPublicController->ProductById($route[1]);
                    
                }
                
                
            }
            
            
            // ROOTING ADMIN
            if($route[0]==="admin"){
                
                ////////////CategroryPrivateController///////////////////////
                
                if($route[1]=== "categories" && !isset($route[2])){ // exemple admin/categories
                    
                    $this->categoryController->allCategories();
                }else
                if($route[1]=== "categorie" && $route[2] === "ajouter"){ //exemple admin/categorie/ajouter
             
                    //  $this->categoryController->addCategory();
                }else
                if($route[1]=== "categorie" && $route[3] === "details"){ //exemple admin/categorie/2/details
             
             
                }else
                if($route[1]=== "categorie" && $route[3] === "modifier"){ //exemple admin/categorie/2/modifier
             
             
                }else
                if($route[1]=== "categorie" && $route[3] === "supprimer"){ //exemple admin/categorie/2/supprimer
             
             
                }
                //////////////////////////////UserController////////////////////////////
                
                if($route[1]==="utilisateurs"){  //exemple admin/utilisateurs
                    
                   
                    // $this->userController->getAllUsers();
                    
                }else 
                if($route[1]==="utilisateur"&& $route[2]==="ajouter"){  //exemple admin/utilisateur/ajouter
                
                        
                    
                }
                 else 
                if($route[1]==="utilisateur"&& $route[3]==="modifier"){//exemple admin/utilisateur/2/modifier
                    
                    
                      
                }
                else 
                if($route[1]==="utilisateur"&& $route[3]==="details"){//exemple admin/utilisateur/2/details
                    
                }
               
                else 
                if($route[1]==="utilisateur"&& $route[3]==="supprimer"){//exemple admin/utilisateur/2/supprimer
                    
                }
            }
            
      
        
        
    }else {
        echo 'dfvfvergf';
       $this->pageController->display404();
    }

}
    
    
}
?>





