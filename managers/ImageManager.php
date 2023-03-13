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
    
    
    
    
}
        