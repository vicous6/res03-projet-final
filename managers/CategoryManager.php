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
    public function createCategory($post){
        
         
    $query = $this->db->prepare('INSERT INTO category VALUES (null, :name)');

    	$parameters = [
	    "name"=>$post["name"]
	];
$query->execute($parameters);
$categories = $query->fetch(PDO::FETCH_ASSOC);


return $categories;
    }
     public function getCategoryById(string $id): Category{
        
     $query = $this->db->prepare('SELECT * FROM category WHERE id = :id
    ');
	$parameters = [
	    "id"=>$id
	];
	
        $query->execute($parameters);
                
        $category = $query->fetch(PDO::FETCH_ASSOC);
        // var_dump($category);
        // $obj = new Product();
        $new = new Category($category["name"]);
        $new->setId($category["id"]);
        
     return $new;
    }
    public function deleteCategoryById(string $id):void{
        
         $query= $this->db->prepare("DELETE FROM category WHERE id=:value");
        $parameters = [
        'value' => $id,
        ];
        $query->execute($parameters);
        $allProducts = $query->fetch(PDO::FETCH_ASSOC);
var_dump($allProducts);
        
    }
    
    public function modifyCategory($post){
        
          $query= $this->db->prepare("UPDATE category SET name =:name WHERE category.id = :id");
        $parameters = [
        'id' =>$post["id"],
        'name' =>$post["name"]
        ];
        $query->execute($parameters);
        
        
    }
  
    
}