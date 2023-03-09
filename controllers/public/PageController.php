<?php

class PageController extends AbstractPublicController {
    
    
//   private UserManager $manager;

 public function __construct()
    {
        
        
        // $this->manager= new UserManager("tonygohin_distorsion","3306","db.3wa.io","tonygohin","f80620de30f1b8d1caba3a7e4b950a9a")  ;
    
       
        
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
    public function contact(){
        
        
        $this->renderPublic( "contact" , ["page de contact"]); 
    }
     public function display404(){
        
        
        $this->renderPublic( "404" , ["page d'erreur"]); 
    }
    
}