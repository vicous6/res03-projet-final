<?php

class CategoryController extends AbstractAdminController
{
    public function __construct()
    {
    }
    public function allCategories()
    {
        if (isset($_SESSION) && $_SESSION["role"] === "admin") {
            $categoryManager = new CategoryManager();
            $truc = $categoryManager->getAllCategories();

            $this->renderAdmin("admin-category", ["categories" => $truc]);
        } else {
            header("Location: /res03-projet-final/produits");
        }
    }
    public function addCategory($post)
    {
        if (isset($post) && !empty($post)) {
            $categoryManager = new CategoryManager();
            $categoryManager->createCategory($post);

            header("Location: /res03-projet-final/admin/categories");
        } else {
            $this->renderAdmin("admin-category-create", []);
        }
    }

    public function updateCategory($post)
    {
        $categoryManager = new CategoryManager();

        if (isset($post) && !empty($post)) {
            $categoryManager->modifyCategory($post);

            header("Location: /res03-projet-final/admin/categories");
        } else {
            $route = explode("/", $_GET["path"]);
            $toDisplay = $categoryManager->getCategoryById($route[2]);

            $this->renderAdmin("admin-category-update", [
                "toDisplay" => $toDisplay,
            ]);
        }
    }

    public function deleteCategory($id)
    {
        $categoryManager = new CategoryManager();

        $action = $categoryManager->deleteCategoryById($id);

        header("Location: /res03-projet-final/admin/categories");
    }
}
