<?php 

class ProductManager extends AbstractManager {

// private PDO $db; 


    public function getAllProducts(){
        
     $query = $this->db->prepare('SELECT products.id, products.name ,products.description ,products.prix,products.stock,category.name as category
    FROM products JOIN category
    ON products.category_id = category.id');
	$parameters = [
	    
	];
	
        $query->execute($parameters);
                
        $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // $obj = new Product();
        $tab= [];
        foreach($allProducts as $product){
            
            
            
            $new = new Product($product["name"],$product["description"],$product["prix"],$product["stock"],$product["category"]);
        $new->setId($product["id"]);
        
        array_push($tab, $new);
        
        }
        
     return $tab;
    }
    public function getProductById(string $id){
        
        $idd = intval( $id,$base = 10);
         $query = $this->db->prepare('SELECT products.id, products.name ,products.description ,products.prix,products.stock,category.name as category
    FROM products JOIN category
    ON products.category_id = category.id
    WHERE products.id = :id
    ');
	$parameters = [
	   "id"=>$idd,
	];
	
        $query->execute($parameters);
                
        $product = $query->fetch(PDO::FETCH_ASSOC);
        
          $new = new Product($product["name"],$product["description"],$product["prix"],$product["stock"],$product["category"]);
        $new->setId($product["id"]);
        
        return $new;
    }
    public function getProductByCategory(string $category){
      
  $query = $this->db->prepare('SELECT products.id, products.name ,products.description ,products.prix,products.stock,category.name as category
    FROM products JOIN category
    ON products.category_id = category.id
    WHERE category.name=:category');
	$parameters = [
	     "category"=>$category,
	];
	
        $query->execute($parameters);
	
       
        $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // $obj = new Product();
        $tab= [];
        foreach($allProducts as $product){
            
            
            
            $new = new Product($product["name"],$product["description"],$product["prix"],$product["stock"],$product["category"]);
        $new->setId($product["id"]);
        
        array_push($tab, $new);
        
        }
        
     return $tab;
    }
}