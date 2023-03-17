<?php


class MaterialController extends AbstractAdminController {
    
    
//   private ProductManager $productManager;

 public function __construct()
    {
        
        
        // $this->productManager= new ProductManager()  ;
    
       
        
    }
    public function AllMaterials(){
        
        $materialManager = new MaterialManager();
               $truc =  $materialManager->getAllMaterials();
               
                 $this->renderAdmin( "admin-material" , ["materials"=>$truc]); 
    }
    public function addMaterial(array $post){
        
        if(isset($post)&&!empty($post)){
            
             $materialManager = new MaterialManager();
             echo "coucou";
        $materialManager->createMaterial($post);
        
            header('Location: /res03-projet-final/admin/materiaux');
        }else{
            
            $this->renderAdmin( "admin-material-create" , []); 
        }
    }
    public function updateMaterial(array $post){
         $materialManager = new MaterialManager();
    
        
        if(isset($post)&&!empty($post)){
            
        $materialManager->modifyMaterial($post);
        
        header('Location: /res03-projet-final/admin/materiaux');
        
        }else{
             $route = explode("/",$_GET["path"]);
             $toDisplay = $materialManager->getMaterialById($route[2]);
             
             $this->renderAdmin( "admin-material-update" , ["toDisplay"=>$toDisplay]); 
        }
        
    }
    public function deleteMaterialById(string $id){
        
        $materialManager = new MaterialManager();
     
             $action = $materialManager->deleteMaterialById($id);
      
             header('Location: /res03-projet-final/admin/materiaux');
        
    }
    
}