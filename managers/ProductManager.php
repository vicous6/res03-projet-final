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
    public function createProduct(array $post):?int{
        var_dump($post);
         $query = $this->db->prepare('INSERT INTO product (id, name, description, prix, stock, category_id) VALUES (NULL, :name,:description,:prix,:stock,:category_id)');

    	$parameters = [
	    "name"=>$post["name"],
	    "description"=>$post["description"],
	    "prix"=>$post["prix"],
	    "stock"=>$post["stock"],
	    
	    "category_id"=>$post["category_id"],
	    
	];
        $query->execute($parameters);
        $lastId = $this->db->lastInsertId();
        $material = $query->fetch(PDO::FETCH_ASSOC);

        
        // var_dump($lastId);
        return $lastId;
    }
    public function deleteProductById($id){
        // querry 1:delete les images associés au produit
        // querry 2:delete les materiaux associés au produit 
        // querry 3:delete le product
        // (tous ca pour eviter les rreur sql type : integrity violation)
         $query= $this->db->prepare("DELETE FROM images WHERE product_id=:value");
        $parameters = [
        'value' => $id,
        ];
        $query->execute($parameters);
        
        $query= $this->db->prepare("DELETE FROM product_has_material WHERE product_id=:value");
        $parameters = [
        'value' => $id,
        ];
        $query->execute($parameters);
        
        
         $query= $this->db->prepare("DELETE FROM product WHERE id=:value");
        $parameters = [
        'value' => $id,
        ];
        $query->execute($parameters);
       
    }
    public function modifyProduct($post){
       
          $query= $this->db->prepare("
          UPDATE product SET 
          name =:name ,
          description=:description,
          prix=:prix,
          stock=:stock
          
          WHERE id = :id");
        $parameters = [
        'id' =>$post["id"],
        'name' =>$post["name"],
        'description' =>$post["description"],
        'prix' =>$post["prix"],
        'stock' =>$post["stock"],
        
        ];
        $query->execute($parameters);
        
    }
}