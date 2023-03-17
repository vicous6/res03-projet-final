<?php

class PageController extends AbstractPublicController {
    
    
  private UserManager $manager;

 public function __construct()
    {
        
        
        $this->manager= new UserManager()  ;
    
       
        
    }
    
    public function homepage(){
        
        // var_dump($_SESSION);
        $this->renderPublic( "homepage" , ["page de connexion"]); 
    }
    public function aPropos(){
        
        // var_dump($_SESSION);
        $this->renderPublic( "aPropos" , ["a-propos"]); 
    }
    public function monPanier(){
        
        // var_dump($_SESSION);
        $this->renderPublic( "monPanier" , [""]); 
    }
    public function login(){
        
        // var_dump($_SESSION);
        $this->renderPublic( "login" , ["page de login"]); 
    }
    public function register(){
        
    //   var_dump($_SESSION);
        $this->renderPublic( "register" , ["page d'inscription"]); 
    }
    public function registerCreateUser(array $post){
        // verif back du formulaire (champ vide)
        var_dump($post);
         if(isset($post["registerUsername"])&&!empty($post["registerUsername"])
     && isset($post["registerEmail"]) && !empty($post["registerEmail"])
     && isset($post["registerPassword"]) && !empty($post["registerPassword"])
     && isset($post["registerConfirmPwd"]) && !empty($post["registerConfirmPwd"])
     && isset($post["number"]) && !empty($post["number"])
     && isset($post["formName"]) && !empty($post["formName"])
     && $post["registerPassword"]=== $post["registerConfirmPwd"]
     && $post["formName"]==="register"
     
     
     ){
         
         
        $userManager = new UserManager();
        $result =  $userManager->getUserByEmail($post["registerEmail"]);
        
        // si on ne trouve pas un user qui a ce mail : renvoi null , donc verif duplication email ok.
        if($result === null ){
            
                // si on ne trouve pas un user qui a ce mail : renvoi null , donc verif duplication email ok.
                 $hash = password_hash($post['registerPassword'], PASSWORD_DEFAULT); // hash le passwor avant de push le user en bdd
           
             $newUser = new User( $post['registerUsername'],$post['registerEmail'], $hash, $post['number'], "customer");
             
            $userManager->createUser($newUser);
                // echo "user créer";
                   header('Location: login');
        }else{
            // echo "le mail existe deja";
             $this->renderPublic( "register" , ["raté ,l'email existe deja"]); 
            
        }
    }else{
          $this->renderPublic( "register" , ["raté un des champs est vide"]); 
    }
    }
    public function logout(){
        
        session_destroy();
        
        var_dump($_SESSION);
           header('Location: accueil');
    }
    public function contact(){
        
        
        $this->renderPublic( "contact" , ["page de contact"]); 
    }
     public function display404(){
        
        
        $this->renderPublic( "404" , ["page d'erreur"]); 
    }
    
}