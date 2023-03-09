<?php 

class ProductManager extends AbstractManager {

// private PDO $db; 


    public function getAllProducts(): array{
        
     $query = $this->db->prepare('SELECT product.id, product.name ,product.description ,product.prix,product.stock,category.name as category
    FROM product JOIN category
    ON product.category_id = category.id');
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
    public function getProductById(string $id): Product{
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
        // querry 2 join la table de liaison materiaux
//         $query2 = $this->db->prepare('SELECT product.id, product.name ,product.description ,product.prix,product.stock,product_has_material.name as category
//     FROM product JOIN product_has_material
//     ON product.category_id = category.id
//     WHERE product.id = :id
//     ');
// 	$parameters = [
// 	   "id"=>$idd,
// 	];
	
//         $query2->execute($parameters);
                
//         $product2 = $query->fetch(PDO::FETCH_ASSOC);
        
        
        
        
        
        
          $new = new Product($product["name"],$product["description"],$product["prix"],$product["stock"],$product["category"]);
        $new->setId($product["id"]);
        
        return $new;
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