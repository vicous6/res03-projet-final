<?php

class PageController extends AbstractPublicController {
    
    
  private UserManager $manager;

 public function __construct()
    {
        
        
        $this->manager= new UserManager()  ;
    
       
        
    }
    
    public function homepage(){
        
        
        $this->renderPublic( "homepage" , ["page de connexion"]); 
    }
    public function aPropos(){
        
        
        $this->renderPublic( "aPropos" , ["a-propos"]); 
    }
    public function login(){
        
        
        $this->renderPublic( "login" , ["page de login"]); 
    }
    public function register(){
        
       
        $this->renderPublic( "register" , ["page d'inscription"]); 
    }
    public function registerCreateUser(array $post){
        
      
       
         $newUser = new User( $post['registerUsername'],$post['registerEmail'], $post['registerPassword'], $post['number'], "customer");
         $userManager = new UserManager();
        $userManager->createUser($newUser);
         echo "createUser";
        $this->renderPublic( "login" , ["un user a été créer"]); 
    }
    public function contact(){
        
        
        $this->renderPublic( "contact" , ["page de contact"]); 
    }
     public function display404(){
        
        
        $this->renderPublic( "404" , ["page d'erreur"]); 
    }
    
}