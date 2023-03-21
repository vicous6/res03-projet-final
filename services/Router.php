<?php 

class Router {

    // private attribute
    
    private PageController $pageController;
    private UserController $userController;
    private CategoryController $categoryController;
    private ImageController $imageController;
    private OrderController $orderController;
     private ProductPublicController $productPublicController;
     private ProductAdminController $productAdminController;
       private LoginController $loginController;
       private MaterialController $materialController;

  


    // public constructor
    public function __construct()
    {
       
        $this->pageController = new PageController();
        $this->userController = new UserController();
        $this->categoryController = new CategoryController();
        $this->imageController = new ImageController();
        $this->orderController = new OrderController();
        $this->productPublicController = new ProductPublicController();
        $this->productAdminController = new ProductAdminController();
         $this->loginController = new LoginController();
         $this->materialController = new MaterialController();
    }

    public function checkRoute(){
    

        if(isset($_GET["path"])){
            // var_dump($_GET["path"]);
            $route = explode("/",$_GET["path"]);
            
            // Pages publics gerer par -> PageController
            if($route[0]=== "accueil"){
                $this->pageController->homepage();
            }else
            if($route[0]=== "contact"){
                $this->pageController->contact();
            }else
            if($route[0]=== "aPropos"){
                $this->pageController->aPropos();
            }else
            if($route[0]=== "monPanier"){
                
                
                $this->pageController->monPanier();
                
            }else
            if($route[0]=== "addPanier"){
                
                
                $this->pageController->addPanier($route[1]);
                
            }else
            if($route[0]=== "deleteFromCart"){
                
                $this->pageController->deleteFromCart($route[1]);
               
                
            }else
            if($route[0]=== "logout"){
                $this->pageController->logout();
            }else
            if($route[0]=== "login"){
                 if (!empty($_POST) && $_POST["formName"]=== "login"){
                    $post = $_POST;
                    //  $_POST = array();
                     $this->loginController->auth($post);
                }else{
                
                $this->pageController->login();
            }
            }else
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
            else
            if($route[0]=== "produits"){
                
                // je n'ai que /produit
                if(!isset($route[1])){
                    
                    $this->productPublicController->allProducts();
                }else if(isset($route[1]) && !isset($route[2])){  // exemple produits/collier
                    
                    $this->productPublicController->allProductsByCategory($route[1]);
                    
                }
                
                
            }
            //ProductPublicController
            else
            if($route[0]=== "produit"){
                
                // je n'ai que /produit
                if(isset($route[1])){ // exemple produit/11
                
                    
                    
                    $this->productPublicController->ProductById($route[1]);
                    
                }
                
                
            }
            
            
            // ROOTING ADMIN
            
            // secruise les routes admin
            else
            if($route[0]==="admin" && isset($_SESSION["role"]) && $_SESSION["role"]=== "admin"){
            //  var_dump($_SESSION);
                ////////////CategroryPrivateController///////////////////////
                
                if($route[1]=== "categories" && !isset($route[2])){ // exemple admin/categories
                    
                    $this->categoryController->allCategories();
                }else
                if($route[1]=== "categorie" && $route[2] === "ajouter"){ //exemple admin/categorie/ajouter
                        $post = $_POST;
                     $this->categoryController->addCategory($post);
                }else
                // if($route[1]=== "categorie" && $route[3] === "details"){ //exemple admin/categorie/2/details
                        
                          
                // }else
                if($route[1]=== "categorie" && $route[3] === "modifier"){ //exemple admin/categorie/2/modifier
                          
                                $post = $_POST;
                                 $this->categoryController->updateCategory($post);
             
                }else
                if($route[1]=== "categorie" && $route[3] === "supprimer"){ //exemple admin/categorie/2/supprimer
             
              $this->categoryController->deleteCategory($route[2]);
                }else
                //////////////////////////////UserController////////////////////////////
                
                if($route[1]==="utilisateurs"){  //exemple admin/utilisateurs
                    
                   
                    $this->userController->AllUsers();
                    
                }else 
                if($route[1]==="utilisateur"&& $route[2]==="ajouter"){  //exemple admin/utilisateur/ajouter
                
                    $this->userController->AllUsers();    
                    
                }
                 else 
                // if($route[1]==="utilisateur"&& $route[3]==="modifier"){//exemple admin/utilisateur/2/modifier
                    
                    
                      
                // }
                // else 
                // if($route[1]==="utilisateur"&& $route[3]==="details"){//exemple admin/utilisateur/2/details
                    
                // }
               
                // else 
                if($route[1]==="utilisateur"&& $route[3]==="supprimer"){//exemple admin/utilisateur/2/supprimer
                    $this->userController->deleteUser($route[2]);
                }else
                // MateraialController
                
                
                 if($route[1]==="materiaux"){  //exemple admin/materiaux
                    
                   
                    $this->materialController->AllMaterials();
                    
                }else 
                if($route[1]==="materiel" && $route[2]==="ajouter"){  //exemple admin/materiel/ajouter
                $post = $_POST;
                    $this->materialController->addMaterial($post);    
                    
                }
                 else 
                if($route[1]==="materiel"&& $route[3]==="modifier"){//exemple admin/materiel/2/modifier
                    
                    $post = $_POST;
                      $this->materialController->updateMaterial($post);   
                }
                else 
                if($route[1]==="materiel"&& $route[3]==="details"){//exemple admin/materiel/2/details
                    
                }
               
                else 
                if($route[1]==="materiel"&& $route[3]==="supprimer"){//exemple admin/materiel/2/supprimer
                    $this->materialController->deleteMaterialById($route[2]);   
                }
                // 
                if($route[1]==="images"){  //exemple admin/images
                    
                   
                    $this->imageController->allImages();
                    
                }else 
                if($route[1]==="image" && $route[2]==="ajouter"){  //exemple admin/image/ajouter
                
                    $post = $_POST;
                    $this->imageController->addImage($post);    
                    
                }
                 else 
                if($route[1]==="image"&& $route[3]==="modifier"){//exemple admin/image/2/modifier
                    
                    $post = $_POST;
                      $this->imageController->updateImage($post);   
                }
                else 
                if($route[1]==="image"&& $route[3]==="details"){//exemple admin/image/2/details
                    
                }
               
                else 
                if($route[1]==="image"&& $route[3]==="supprimer"){//exemple admin/image/2/supprimer
                    
                     $this->imageController->deleteImage($route[2]);    
                }
                // 
                // 
                if($route[1]==="produits"){  //exemple admin/produits
                    
                   
                    $this->productAdminController->allProducts();
                    
                }else 
                if($route[1]==="produit" && $route[2]==="ajouter"){  //exemple admin/produit/ajouter
                
                    $post = $_POST;
                    $this->productAdminController->addProduct($post);    
                    
                }
                 else 
                if($route[1]==="produit"&& $route[3]==="modifier"){//exemple admin/produit/2/modifier
                    
                    $post = $_POST;
                    //   $this->imageController->updateImage($post);   
                }
                else 
                if($route[1]==="produit"&& $route[3]==="details"){//exemple admin/produit/2/details
                    
                }
               
                else 
                if($route[1]==="produit"&& $route[3]==="supprimer"){//exemple admin/produit/2/supprimer
                    
                     $this->productAdminController->deleteProduct($route[2]);    
                }
                
            }
            else{
                  header('Location: /res03-projet-final/produits'); 
                  
            }
      
        
        
    }else {
        echo 'dfvfvergf';
       $this->pageController->display404();
    }

}
    
    
}
?>





