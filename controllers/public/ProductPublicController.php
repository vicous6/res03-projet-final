<?php

// require 'AbstractController.php';
// require 'managers/UserManager.php';

class ProductPublicController extends AbstractPublicController {
    
    
  private ProductManager $productManager;

 public function __construct()
    {
        
        
        $this->productManager= new ProductManager()  ;
    
       
        
    }
    
   
    public function allProducts(){
         $productManager = new ProductManager()  ;
         $imageManager = new ImageManager();
         $materialManager = new MaterialManager();
         
         $images =  $imageManager-> getAllImages();
         $products=   $productManager->getAllProducts();
       
        
       
      
       foreach($products as $product){
           
           $imageTab = ["id"=>$product->getId()];
           
           $materials =  $materialManager-> getAllMaterialsByProductId($product->getId());
           
           
            // hydrate chaque produit avec ses images
           foreach($images as $image){
           
            if($image->getProductName() === $product->getName()){
             // 
             // array_push($imageTab, $image->getUrl());
             $product->addImages($image->getUrl());
            }
            
           }
           // pour chaque materiau trouvé pour ce produit: je l'ajoute a l'object product
           foreach($materials as $material){

                   $product->addMaterial($material->getName());
           
           }
        // array_push($tab,$imageTab);
       }
       // 
       // 
       // 
       
        // $objAll= new Product()
        $this->renderPublic( "products" , ["products"=>$products]); 
    }
    public function allProductsByCategory($routeName){
        
            $productManager = new ProductManager()  ;
         // var_dump($routeName);
       $all=   $productManager->getProductByCategory($routeName);
        $this->renderPublic( "productsCategory" , [$all]); 
    }
    public function ProductById(string $routeId){
     
        // var_dump($routeId);
        
         $productManager = new ProductManager()  ;
          $imageManager = new ImageManager()  ;
        
       $all=$productManager->getProductById($routeId);
       
       $images= $imageManager->getImagesById($routeId);
       
       foreach($images as $image){
        
        $all->addImages($image->getUrl());
       }
       

       
        $this->renderPublic( "product" , ["products" => $all]); 
    }
}