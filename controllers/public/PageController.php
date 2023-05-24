<?php

class PageController extends AbstractPublicController
{
    private UserManager $manager;

    public function __construct()
    {
        $this->manager = new UserManager();
    }

    public function homepage()
    {
        // var_dump($_SESSION);
        $this->renderPublic("homepage", ["page de connexion"]);
    }
    public function aPropos()
    {
        // var_dump($_SESSION);
        $this->renderPublic("aPropos", ["a-propos"]);
    }
    public function monPanier()
    {
        $cart = [];
        $imageManager = new ImageManager();
        $images = $imageManager->getAllImages();

        if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $id) {
                if ($id !== "") {
                    $productManager = new ProductManager();
                    $result = $productManager->getProductById($id);

                    foreach ($images as $image) {
                        if ($image->getProductName() === $result->getName()) {
                            $result->addImages($image->getUrl());
                        }
                    }

                    array_push($cart, $result);
                }
            }
        }

        $this->renderPublic("monPanier", ["cart" => $cart]);
    }

    public function addPanier($id)
    {
  

        $_SESSION["cart"][] = $id;
    }
    public function deleteFromCart($id)
    {
        // var_dump($_SESSION["cart"]);
        foreach ($_SESSION["cart"] as $index => $produit) {
            if ($produit === $id) {
                $_SESSION["cart"][$index] = "";

                header("Location: /res03-projet-final/monPanier");
                die();
            }
        }
    }
    public function login()
    {
      
        $this->renderPublic("login", [""]);
    }
    public function register()
    {
   
        $this->renderPublic("register", [""]);
    }
    public function registerCreateUser(array $post)
    {
        // verif back du formulaire (champ vide)
        // var_dump($post);
        if (
            isset($post["registerUsername"]) &&
            !empty($post["registerUsername"]) &&
            isset($post["registerEmail"]) &&
            !empty($post["registerEmail"]) &&
            isset($post["registerPassword"]) &&
            !empty($post["registerPassword"]) &&
            isset($post["registerConfirmPwd"]) &&
            !empty($post["registerConfirmPwd"]) &&
            isset($post["number"]) &&
            !empty($post["number"]) &&
            isset($post["formName"]) &&
            !empty($post["formName"]) &&
            $post["registerPassword"] === $post["registerConfirmPwd"] &&
            $post["formName"] === "register"
        ) {
            
            $post["registerUsername"] = $this->clean($post["registerUsername"]);
            $post["registerEmail"] = $this->clean($post["registerEmail"]);
            $post["registerPassword"] = $this->clean($post["registerPassword"]);
            $post["registerConfirmPwd"] = $this->clean($post["registerConfirmPwd"]);
            $post["number"] = $this->clean($post["number"]);
            
            
            $userManager = new UserManager();
            $result = $userManager->getUserByEmail($post["registerEmail"]);

            // si on ne trouve pas un user qui a ce mail : renvoi null , donc verif duplication email ok.
            if ($result === null) {
                // si on ne trouve pas un user qui a ce mail : renvoi null , donc verif duplication email ok.
                $hash = password_hash(
                    $post["registerPassword"],
                    PASSWORD_DEFAULT
                ); // hash le passwor avant de push le user en bdd

                $newUser = new User(
                    $post["registerUsername"],
                    $post["registerEmail"],
                    $hash,
                    $post["number"],
                    "customer"
                );

                $userManager->createUser($newUser);
                // echo "user créer";
                header("Location: login");
            } else {
                // echo "le mail existe deja";
                $this->renderPublic("register", ["L'inscription à échouée"]);
            }
        } else {
            $this->renderPublic("register", ["L'inscription à échouée"]);
        }
    }
    public function logout()
    {
        session_destroy();

        header("Location: accueil");
    }
    public function contact()
    {
        $this->renderPublic("contact", ["page de contact"]);
    }
    public function display404()
    {
        $this->renderPublic("404", ["page d'erreur"]);
    }
}
