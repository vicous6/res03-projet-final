<?php 

class ProductManager extends AbstractManager {

// private PDO $db; 


    public function getAllProducts(): array{
        
     $query = $this->db->prepare('SELECT product.id, product.name ,product.description ,product.prix,product.stock,category.name as category
    FROM product JOIN category
    ON product.category_id = category.id
    ORDER BY product.id desc');
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
    public function getProductById(string $id): ?Product{
        // querry 1 join les categories
        $idd = intval( $id,$base = 10);
         $query = $this->db->prepare('SELECT product.id, product.name ,product.description ,product.prix,product.stock,category.name as category
    FROM product JOIN category
    ON product.category_id = category.id
    WHERE product.id = :id
    ');
	$parameters = [
	   "id"=>$idd,
	];
	
        $query->execute($parameters);
                
        $product = $query->fetch(PDO::FETCH_ASSOC);
        
        if($product){
            
          $new = new Product($product["name"],$product["description"],$product["prix"],$product["stock"],$product["category"]);
        $new->setId($product["id"]);
            return $new;
        }
        return null ;
    
    }
    public function getProductByCategory(string $category): array{
      
  $query = $this->db->prepare('SELECT product.id, product.name ,product.description ,product.prix,product.stock,category.name as category
    FROM product JOIN category
    ON product.category_id = category.id
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