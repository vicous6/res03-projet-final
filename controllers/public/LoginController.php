<?php

class LoginController extends AbstractPublicController {
    
    
  private UserManager $manager;

 public function __construct()
    {
        
        
        $this->manager= new UserManager()  ;
    
       
        
    }
 
 public function auth($post){
     
     
     $userManager = new UserManager();
   $truc =   $userManager->getUserByEmail($post["login"]);
   
   var_dump($truc);
   var_dump($post);
   
   
   
   
   
   
//   a faire : verifier la coresspondance de $truc et $post 
// rediriger vers login ou produits suivant resultat
// appeler le manager de produits pour render les data si render produit
   
      $this->renderPublic( "produits" , [$truc]); 
 }   
}