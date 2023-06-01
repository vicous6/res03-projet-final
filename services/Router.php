<?php

class Router
{
    // private attribute

    private PageController $pageController;
    private UserController $userController;
    private CategoryController $categoryController;
    private ImageController $imageController;
    private OrderController $orderController;
    private ProductPublicController $productPublicController;
    private ProductAdminController $productAdminController;
    private LoginController $loginController;
    private MaterialController $materialController;

    // public constructor
    public function __construct()
    {
        $this->pageController = new PageController();
        $this->userController = new UserController();
        $this->categoryController = new CategoryController();
        $this->imageController = new ImageController();
        $this->orderController = new OrderController();
        $this->productPublicController = new ProductPublicController();
        $this->productAdminController = new ProductAdminController();
        $this->loginController = new LoginController();
        $this->materialController = new MaterialController();
    }

    public function checkRoute()
    {
        if (isset($_GET["path"])) {
            // var_dump($_GET["path"]);
             
            $route = explode("/", $_GET["path"]);

            // Pages publics gerer par -> PageController
            if ($route[0] === "accueil") {
                $this->pageController->homepage();
            } elseif ($route[0] === "contact") {
                $this->pageController->contact();
            } elseif ($route[0] === "aPropos") {
                $this->pageController->aPropos();
            } elseif ($route[0] === "monPanier") {
                $this->pageController->monPanier();
            } elseif ($route[0] === "addPanier") {
                $this->pageController->addPanier($route[1]);
            } elseif ($route[0] === "deleteFromCart") {
                $this->pageController->deleteFromCart($route[1]);
            } elseif ($route[0] === "logout") {
                $this->pageController->logout();
            } elseif ($route[0] === "login") {
                if (!empty($_POST) && $_POST["formName"] === "login") {
                    $post = $_POST;
                    //  $_POST = array();
                    $this->loginController->auth($post);
                } else {
                    $this->pageController->login();
                }
            } elseif ($route[0] === "register") {
                if (!empty($_POST) && $_POST["formName"] === "register") {
                    $post = $_POST;
                    //  $_POST = array();
                    $this->pageController->registerCreateUser($post);
                } else {
                    $this->pageController->register();
                }
            }

            //ProductPublicController
            elseif ($route[0] === "produits") {
                // je n'ai que /produit
                if (!isset($route[1])) {
                    $this->productPublicController->allProducts();
                } elseif (isset($route[1]) && !isset($route[2])) {
                    // exemple produits/collier

                    $this->productPublicController->allProductsByCategory(
                        $route[1]
                    );
                }
            }
            //ProductPublicController
            elseif ($route[0] === "produit") {
                // je n'ai que /produit
                if (isset($route[1])) {
                    // exemple produit/11

                    $this->productPublicController->ProductById($route[1]);
                }
            }

            // ROOTING ADMIN
            // secruise les routes admin
            elseif (
                $route[0] === "admin" &&
                isset($_SESSION["role"]) &&
                $_SESSION["role"] === "admin"
            ) {
               
                ////////////CategroryPrivateController///////////////////////

                if ($route[1] === "categories" && !isset($route[2])) {
                    // exemple admin/categories

                    $this->categoryController->allCategories();
                } elseif (
                    $route[1] === "categorie" &&
                    $route[2] === "ajouter"
                ) {
                    //exemple admin/categorie/ajouter
                    $post = $_POST;
                    $this->categoryController->addCategory($post);
                }
                // if($route[1]=== "categorie" && $route[3] === "details"){ //exemple admin/categorie/2/details
                // }else
                elseif ($route[1] === "categorie" && $route[3] === "modifier") {
                    //exemple admin/categorie/2/modifier

                    $post = $_POST;
                    $this->categoryController->updateCategory($post);
                } elseif (
                    $route[1] === "categorie" &&
                    $route[3] === "supprimer"
                ) {
                    //exemple admin/categorie/2/supprimer

                    $this->categoryController->deleteCategory($route[2]);
                }
                //////////////////////////////UserController////////////////////////////
                elseif ($route[1] === "utilisateurs") {
                    //exemple admin/utilisateurs

                    $this->userController->AllUsers();
                } elseif (
                    $route[1] === "utilisateur" &&
                    $route[2] === "ajouter"
                ) {
                    //exemple admin/utilisateur/ajouter

                    $this->userController->AllUsers();
                }
                // if($route[1]==="utilisateur"&& $route[3]==="modifier"){//exemple admin/utilisateur/2/modifier
                // }
                // else
                // if($route[1]==="utilisateur"&& $route[3]==="details"){//exemple admin/utilisateur/2/details
                // }
                // else
                elseif (
                    $route[1] === "utilisateur" &&
                    $route[3] === "supprimer"
                ) {
                    //exemple admin/utilisateur/2/supprimer
                    $this->userController->deleteUser($route[2]);
                }
                // MateraialController
                elseif ($route[1] === "materiaux") {
                    //exemple admin/materiaux

                    $this->materialController->AllMaterials();
                } elseif ($route[1] === "materiel" && $route[2] === "ajouter") {
                    //exemple admin/materiel/ajouter
                    $post = $_POST;
                    $this->materialController->addMaterial($post);
                } elseif (
                    $route[1] === "materiel" &&
                    $route[3] === "modifier"
                ) {
                    //exemple admin/materiel/2/modifier

                    $post = $_POST;
                    $this->materialController->updateMaterial($post);
                } elseif ($route[1] === "materiel" && $route[3] === "details") {
                    //exemple admin/materiel/2/details
                } elseif (
                    $route[1] === "materiel" &&
                    $route[3] === "supprimer"
                ) {
                    //exemple admin/materiel/2/supprimer
                    $this->materialController->deleteMaterialById($route[2]);
                }
                //
                if ($route[1] === "images") {
                    //exemple admin/images

                    $this->imageController->allImages();
                } elseif ($route[1] === "image" && $route[2] === "ajouter") {
                    //exemple admin/image/ajouter

                    $post = $_POST;
                    $this->imageController->addImage($post);
                } elseif ($route[1] === "image" && $route[3] === "modifier") {
                    //exemple admin/image/2/modifier

                    $post = $_POST;
                    $this->imageController->updateImage($post);
                } elseif ($route[1] === "image" && $route[3] === "details") {
                    //exemple admin/image/2/details
                } elseif ($route[1] === "image" && $route[3] === "supprimer") {
                    //exemple admin/image/2/supprimer

                    $this->imageController->deleteImage($route[2]);
                }
                //
                //
                if ($route[1] === "produits") {
                    //exemple admin/produits

                    $this->productAdminController->allProducts();
                } elseif ($route[1] === "produit" && $route[2] === "ajouter") {
                    //exemple admin/produit/ajouter

                    $post = $_POST;
                    $this->productAdminController->addProduct($post);
                } elseif ($route[1] === "produit" && $route[3] === "modifier") {
                    //exemple admin/produit/2/modifier

                    $post = $_POST;
                    $this->productAdminController->updateProduct($post);
                } elseif ($route[1] === "produit" && $route[3] === "details") {
                    //exemple admin/produit/2/details
                } elseif (
                    $route[1] === "produit" &&
                    $route[3] === "supprimer"
                ) {
                    //exemple admin/produit/2/supprimer

                    $this->productAdminController->deleteProduct($route[2]);
                }
            }
            // Toute les url qui ne correspondent a rien de valide
            else {
            $this->pageController->display404();
            }
        } else {
                header("Location: /res03-projet-final/accueil");
           $this->pageController->homepage();
        }
    }
} ?>





