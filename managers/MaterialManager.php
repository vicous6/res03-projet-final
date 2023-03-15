<?php 

class MaterialManager extends AbstractManager {

// private PDO $db; 


    public function getAllMaterials(): array{
        
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
    
    
    
    
    
}