<?php

class MaterialManager extends AbstractManager
{
    public function getAllMaterials(): array
    {
        $query = $this->db->prepare("SELECT * FROM material");
        $parameters = [];

        $query->execute($parameters);

        $materials = $query->fetchAll(PDO::FETCH_ASSOC);

        $tab = [];
        foreach ($materials as $material) {
            $new = new Material($material["name"]);
            $new->setId($material["id"]);

            array_push($tab, $new);
        }

        return $tab;
    }

    public function createMaterial(array $post)
    {
        $query = $this->db->prepare(
            "INSERT INTO material VALUES (null, :name)"
        );
      
        $parameters = [
            "name" => $post["name"],
        ];
        $query->execute($parameters);
        $material = $query->fetch(PDO::FETCH_ASSOC);

        return $material;
    }
    public function deleteMaterialById(string $id)
    {
        
        $query = $this->db->prepare("DELETE FROM material WHERE id=:value");
        $parameters = [
            "value" => $id,
        ];
        
        
      
        try{
            $query->execute($parameters);
            return "ok";
        } catch(Exception $e){
            return null;
        }
        $material = $query->fetch(PDO::FETCH_ASSOC);
        
        return "ok";
    }
    public function modifyMaterial(array $post)
    {
        $query = $this->db->prepare(
            "UPDATE material SET name =:name WHERE material.id = :id"
        );
        $parameters = [
            "id" => $post["id"],
            "name" => $post["name"],
        ];
        $query->execute($parameters);
    }
    public function getMaterialById(string $id)
    {
        $query = $this->db->prepare("SELECT * FROM material WHERE id= :id");
        $parameters = [
            "id" => $id,
        ];

        $query->execute($parameters);

        $material = $query->fetch(PDO::FETCH_ASSOC);

        $new = new Material($material["name"]);
        $new->setId($material["id"]);
        return $new;
    }

    // joiture produits /materiaux
    public function getAllMaterialsByProductId($id)
    {
        $query = $this->db->prepare(
            "SELECT material.* from product_has_material 
             JOIN material ON product_has_material.material_id=material.id
             JOIN product ON product_has_material.product_id=product.id WHERE product.id = :id
            "
        );
        $parameters = [
            "id" => $id,
        ];
        $query->execute($parameters);

        $materials = $query->fetchAll(PDO::FETCH_ASSOC);
        //   var_dump($materials);

        $tab = [];
        foreach ($materials as $material) {
            $new = new Material($material["name"]);
            $new->setId($material["id"]);
            // var_dump($new);
            array_push($tab, $new);
        }
        return $tab;
    }

    public function createMaterialOnProduct($post, $productIdInDb)
    {
        if (!empty($post["materiaux"])) {
            $query = $this->db->prepare(
                "INSERT INTO product_has_material VALUES (:id, :name)"
            );

            $parameters = [
                "id" => $productIdInDb,
                "name" => $post["materiaux"],
            ];

            $query->execute($parameters);
        }
        if (!empty($post["materiaux2"])) {
            $query = $this->db->prepare(
                "INSERT INTO product_has_material VALUES (:id, :name)"
            );

            $parameters = [
                "id" => $productIdInDb,
                "name" => $post["materiaux2"],
            ];

            $query->execute($parameters);
        }
        if (!empty($post["materiaux3"])) {
            $query = $this->db->prepare(
                "INSERT INTO product_has_material VALUES (:id, :name)"
            );

            $parameters = [
                "id" => $productIdInDb,
                "name" => $post["materiaux3"],
            ];

            $query->execute($parameters);
        }
    }
}
