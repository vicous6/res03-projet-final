<?php

class LoginController extends AbstractPublicController {
    
    
  private UserManager $manager;

 public function __construct()
    {
        
        
        $this->manager= new UserManager()  ;
    
    //   attention je n'initialise pas de ProductManager dans la fonction auth
        
    }
 
 public function auth($post){
     
     
     $userManager = new UserManager();
   $emailExistence =   $userManager->getUserByEmail($post["login"]);
//   echo "truc =";
//   var_dump ($emailExistence);
//   var_dump($truc);
//   var_dump($post);
   
//   echo $post["password"];

    



    // si l'email n'existe pas -> on verifie si les pass correspondent
   if($emailExistence !== null){
       
        // si les pass correspondent on LOGIN A FAIRE
        $isPassOk = password_verify($post["password"],$emailExistence->getPassword());
                    if($isPassOk=== true){
                         
                       echo "Le pass et le hash correspondent";
                //  A FAIRE : gerer les sessions
                       
                       
                       
                       
                       
                    //   recupère les data produits pour les afficher
                       $productManager = new ProductManager()  ;
                       $all=   $productManager->getAllProducts();
                        // $objAll= new Product()
                        $this->renderPublic( "products" , [$all]); 
                    }else{
                        echo "le mail existe mais pas le pass";
                        $this->renderPublic( "login" , ["raté"]); 
                    }  
      
   }else{
     
         echo "Ce mail n'existe pas";
          $this->renderPublic( "login" ,["authentification ratée"]);
   }
   
   
//   a faire : verifier la coresspondance de $truc et $post 
// rediriger vers login ou produits suivant resultat
// appeler le manager de produits pour render les data si render produit
   
 }   
 
}