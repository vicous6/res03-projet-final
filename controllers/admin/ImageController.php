<?php

class ImageController extends AbstractAdminController
{
    public function __construct()
    {
    }
    public function AllImages()
    {
        $imageManager = new ImageManager();

        $truc = $imageManager->getAllImages();

        $this->renderAdmin("admin-image", ["images" => $truc]);
    }
    public function addImage($post)
    {
        if (isset($post) && !empty($post)) {
            $uploader = new Uploader();
            $media = $uploader->upload($_FILES, "image");
            
            if ($media === null) {
                header("Location: /res03-projet-final/admin/images");
            }

            $post["url"] = $media->getUrl();

            $imageManager = new ImageManager();
            
            $post["name"]= $this->clean($post["name"]);
            $post["produit"]= $this->clean($post["produit"]);
            
            $imageManager->createImage($post);

            header("Location: /res03-projet-final/admin/images");
        } else {
            $produitManager = new ProductManager();
            $result = $produitManager->getAllProducts();
            $this->renderAdmin("admin-image-create", ["produits" => $result]);
        }
    }

    public function updateImage($post)
    {
    }

    public function deleteImage($id)
    {
        $imageManager = new ImageManager();

        $truc = $imageManager->deleteImageById($id);

        header("Location: /res03-projet-final/admin/images");
    }
}
