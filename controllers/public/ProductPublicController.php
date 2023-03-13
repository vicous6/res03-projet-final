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
        $images =  $imageManager-> getAllImages();
       $products=   $productManager->getAllProducts();
       
      $tab= [];
       // echo count($images);
       // echo count($products);
       
       // un tableau qui contient un tableau d'images pour chaque produits
       foreach($products as $product){
           
           $imageTab = ["id"=>$product->getId()];
           
           foreach($images as $image){
           
            if($image->getProductName() === $product->getName()){
             
             array_push($imageTab, $image->getUrl());
            }
            
           }
        array_push($tab,$imageTab);
       }
       
        // $objAll= new Product()
        $this->renderPublic( "products" , ["products"=>$products,"images"=>$tab]); 
    }
    public function allProductsByCategory($routeName){
        
            $productManager = new ProductManager()  ;
         var_dump($routeName);
       $all=   $productManager->getProductByCategory($routeName);
        $this->renderPublic( "productsCategory" , [$all]); 
    }
    public function ProductById(string $routeId){
        
         $productManager = new ProductManager()  ;
         var_dump($routeId);
       $all=   $productManager->getProductById($routeId);
        $this->renderPublic( "product" , [$all]); 
    }
}