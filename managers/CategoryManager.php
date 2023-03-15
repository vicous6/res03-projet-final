<?php 

class CategoryManager extends AbstractManager {

// private PDO $db; 


    public function getAllCategories(): array{
        
     $query = $this->db->prepare('SELECT * FROM category 
    ');
	$parameters = [
	    
	];
	
        $query->execute($parameters);
                
        $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // $obj = new Product();
        $tab= [];
        foreach($allProducts as $product){
            
            
            
            $new = new Category($product["name"]);
        $new->setId($product["id"]);
        
        array_push($tab, $new);
        
        }
        
     return $tab;
    }
    
    
    
    
    
}