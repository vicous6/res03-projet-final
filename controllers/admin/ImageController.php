<?php


class ImageController extends AbstractAdminController {
    
    
//   private ProductManager $productManager;

 public function __construct()
    {
        
        
        // $this->productManager= new ProductManager()  ;
    
       
        
    }
    public function AllImages(){
        
            $imageManager = new ImageManager();
            
            $truc =  $imageManager->getAllImages();
               
            $this->renderAdmin( "admin-image" , ["images"=>$truc]); 
    }
    public function addImage($post){
        
        
         if(isset($post)&&!empty($post)){
             
             $uploader = new Uploader();
             $media = $uploader->upload($_FILES, "image");
             
             
             if($media=== null){
                 
                 header('Location: /res03-projet-final/admin/images');
             }
             
           
             $post["url"]=$media->getUrl();
            
             $imageManager = new ImageManager();
             $imageManager->createImage($post);
        
            header('Location: /res03-projet-final/admin/images');
            
        }else{
           $produitManager = new ProductManager();
             $result = $produitManager->getAllProducts();
            $this->renderAdmin( "admin-image-create" , ["produits"=>$result]); 
        }
        
    }
    
    public function updateImage($post){
        
        
        
    }
    
    
    
    
    
    
    public function deleteImage($id){
        $imageManager = new ImageManager();
       
        // $fileToDeleteUrl = $media[]->getUrl();
        // unlink($fileToDeleteUrl);
         
    
             $truc =  $imageManager->deleteImageById($id);
      
             header('Location: /res03-projet-final/admin/images');
    }
    
}