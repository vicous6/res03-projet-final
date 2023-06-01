<?php


class ProductAdminController extends AbstractAdminController
{
    private ProductManager $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    public function allProducts()
    {
        $productManager = new ProductManager();
        $imageManager = new ImageManager();
        $materialManager = new MaterialManager();

        $images = $imageManager->getAllImages();
        $products = $productManager->getAllProducts();

        foreach ($products as $product) {
            $imageTab = ["id" => $product->getId()];

            $materials = $materialManager->getAllMaterialsByProductId(
                $product->getId()
            );

            // hydrate chaque produit avec ses images
            foreach ($images as $image) {
                if ($image->getProductName() === $product->getName()) {
                    //
                    // array_push($imageTab, $image->getUrl());
                    $product->addImages($image->getUrl());
                }
            }
            // pour chaque materiau trouvé pour ce produit: je l'ajoute a l'object product
            foreach ($materials as $material) {
                $product->addMaterial($material->getName());
            }
         
        }
  
        $this->renderAdmin("admin-products", ["products" => $products]);
    }

    public function addProduct($post)
    {
        if (isset($post) && !empty($post)) {
            $productManager = new ProductManager();
            $materielManager = new MaterialManager();
            $categoryManager = new CategoryManager();
            
            
            $post["name"]= $this->clean($post["name"]);
            $post["description"]= $this->clean($post["description"]);
            $post["prix"]= $this->clean($post["prix"]);
            $post["stock"]= $this->clean($post["stock"]);
            $post["category_id"]= $this->clean($post["category_id"]);
            $post["materiaux"]= $this->clean($post["materiaux"]);
            $post["materiaux2"]= $this->clean($post["materiaux2"]);
            $post["materiaux3"]= $this->clean($post["materiaux3"]);
            
            $productIdInDb = $productManager->createProduct($post);

            $materielManager->createMaterialOnProduct($post, $productIdInDb);

            header("Location: /res03-projet-final/admin/produits");
        } else {
            $categoryManager = new CategoryManager();
            $data = $categoryManager->getAllCategories();

            $materialManager = new MaterialManager();
            $data2 = $materialManager->getAllMaterials();
            $this->renderAdmin("admin-product-create", [
                "categories" => $data,
                "materiaux" => $data2,
            ]);
        }
    }
    public function deleteProduct(string $id)
    {
        $productManager = new ProductManager();
        $productManager->deleteProductById($id);

        header("Location: /res03-projet-final/admin/produits");
    }
    public function updateProduct($post)
    {
        $productManager = new ProductManager();

        if (isset($post) && !empty($post)) {
            // FAILLE XSS
            // var_dump($post);
            // die;
             $post["name"] = $this->clean($post["name"]);
            $post["description"]= $this->clean($post["description"]);
            $post["prix"]= $this->clean($post["prix"]);
            $post["stock"]= $this->clean($post["stock"]);
          
            $productManager->modifyProduct($post);

            header("Location: /res03-projet-final/admin/produits");
        } else {
            $route = explode("/", $_GET["path"]);
            $toDisplay = $productManager->getProductById($route[2]);

            $this->renderAdmin("admin-product-update", [
                "toDisplay" => $toDisplay,
            ]);
        }
    }
}
