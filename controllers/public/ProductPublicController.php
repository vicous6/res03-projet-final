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
     // var_dump($_SESSION);
         $productManager = new ProductManager()  ;
         $imageManager = new ImageManager();
         $materialManager = new MaterialManager();
          $categorieManager = new CategoryManager()  ;
          
          
          
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
        $categories = $categorieManager->getAllCategories();
       // var_dump($categories);
       
       
        // $objAll= new Product()
        $this->renderPublic( "products" , ["products"=>$products,"categories"=>$categories]); 
    }
    public function allProductsByCategory($routeName){
        
              $productManager = new ProductManager()  ;
         $imageManager = new ImageManager();
         $materialManager = new MaterialManager();
         $images =  $imageManager-> getAllImages();
         // var_dump($routeName);
       $products =   $productManager->getProductByCategory($routeName);
      
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
     
       // var_dump($categories);
               $this->renderPublic( "productsCategory" , ["products"=>$products]); 

       
        // $objAll= new Product()
     
    }
    public function ProductById(string $routeId){
     
        // var_dump($routeId);
        
         $productManager = new ProductManager()  ;
          $imageManager = new ImageManager()  ;
          $materialManager = new MaterialManager()  ;
         
        
       $all=$productManager->getProductById($routeId);
       
       $images= $imageManager->getImagesById($routeId);
       
       $materials =  $materialManager-> getAllMaterialsByProductId($routeId);
       // var_dump($materials);
       foreach($images as $image){
        
        $all->addImages($image->getUrl());
       }
       
       foreach($materials as $material){

                   $all->addMaterial($material->getName());
           
           }
       
       
       
      
        $this->renderPublic( "product" , ["products" => $all]); 
    }
}