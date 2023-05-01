<?php 

class ImageManager extends AbstractManager {

// private PDO $db; 


    // renvoie toutes les image avec la joiture sur le nom du produit relié
    public function getAllImages():array{
        
        
        // querry 1 join les categories
        // $idd = intval( $id,$base = 10);
         $query = $this->db->prepare('SELECT images.id, images.description ,images.url ,product.name
    FROM images JOIN product
    ON images.product_id = product.id
    
    ');
	$parameters = [
	   
	];
	
        $query->execute($parameters);
                
        $images = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $tab = [];
        foreach($images as $image){
            
            $new = new Image($image["description"],$image["url"],$image["name"]);
            $new->setId($image["id"]);
            array_push($tab, $new);
        }
        
        
        
             
             
          return $tab;   
             
         }
    // recupère toutes images d'un produit
    public function getImagesById($id):array{
        
         $idd = intval( $id,$base = 10);
        // querry 1 join les categories
        // $idd = intval( $id,$base = 10);
         $query = $this->db->prepare('SELECT images.id, images.description ,images.url ,product.name 
    FROM images JOIN product
    ON images.product_id = product.id
    WHERE product.id = :id
    
    
    ');
	$parameters = [
	   "id"=>$idd,
	];
	
        $query->execute($parameters);
                
        $images = $query->fetchAll(PDO::FETCH_ASSOC);
        
    //   var_dump($images);
            
         $tab = [];
        foreach($images as $image){
            
            $new = new Image($image["description"],$image["url"],$image["name"]);
            $new->setId($image["id"]);
            array_push($tab, $new);
        }
        
        
        
        
        
             
             
          return $tab;   
             
         }
    
    public function deleteImageById($id):void{
       
         $query= $this->db->prepare("DELETE FROM images WHERE id=:value");
        $parameters = [
        'value' => $id,
        ];
        $query->execute($parameters);
        $allProducts = $query->fetch(PDO::FETCH_ASSOC);
    }
    public function createImage($post){
         $query = $this->db->prepare('INSERT INTO images (id, description, url, product_id) VALUES (NULL, :description, :url , :product_id )');
var_dump($post);

    	$parameters = [
	    "description"=>$post["name"],
	    "url"=>$post["url"],
	    "product_id"=>$post["produit"]
	];
$query->execute($parameters);

    }
    
}
        