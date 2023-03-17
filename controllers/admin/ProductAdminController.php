<?php

// require 'AbstractController.php';
// require 'managers/UserManager.php';

class ProductAdminController extends AbstractAdminController {
    
    
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
        $this->renderAdmin( "admin-products" , ["products"=>$products]); 
    }
    
    public function addProduct($post){
        
         if(isset($post)&&!empty($post)){
            
             $productManager = new ProductManager();
             $materielManager = new MaterialManager();
             $categoryManager = new CategoryManager();
             
             $productManager->createProduct($post);
             $materialManager->createMaterialOnProduct($post);
             
             die;
             
             
             
             
        
            header('Location: /res03-projet-final/admin/produits');
            
            
        }else{
            
            
             $categoryManager = new CategoryManager();
             $data = $categoryManager->getAllCategories();
             
             $materialManager = new MaterialManager();
             $data2 = $materialManager->getAllMaterials();
            $this->renderAdmin( "admin-product-create" , ["categories"=>$data, "materiaux"=>$data2]); 
        }
    }
    
}