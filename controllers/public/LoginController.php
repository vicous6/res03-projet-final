<?php

class LoginController extends AbstractPublicController
{
    private UserManager $manager;

    public function __construct()
    {
        $this->manager = new UserManager();

        //   attention je n'initialise pas de ProductManager dans la fonction auth
    }

    public function auth($post)
    {
        //  verification back du form (les champ sont il vide)

        if (
            isset($post["email"]) &&
            !empty($post["email"]) &&
            isset($post["password"]) &&
            !empty($post["password"])
        ) {
            
            $post["email"] = $this->clean($post["email"]);
            $post["password"] = $this->clean($post["password"]);
        
            
            
            
            
            $userManager = new UserManager();
            $emailExistence = $userManager->getUserByEmail($post["email"]);
            
            // si l'email existe -> on verifie si les pass correspondent
            if ($emailExistence !== null) {
                // si les pas correspondent on LOGIN A FAIRE
                $isPassOk = password_verify(
                    $post["password"],
                    $emailExistence->getPassword()
                );
                if ($isPassOk === true) {
                    // "Le pass et le hash correspondent";

                    $_SESSION["isConnected"] = true;
                    $_SESSION["role"] = $emailExistence->getRole();
                    $_SESSION["username"] = $emailExistence->getUsername();

                    //   si l'utilisateur qui se connecte est l'admin
                    if (isset($_SESSION) && $_SESSION["role"] === "admin") {
                        header("Location: admin/categories");
                    } else {
                        header("Location: produits");
                    }
                } else {
                    // echo "le mail existe mais pas le pass";
                    $this->renderPublic("login", ["Le login à échoué"]);
                }
            } else {
                // echo "Ce mail n'existe pas";
                $this->renderPublic("login", ["Le login à échoué"]);
            }
        } else {
            $this->renderPublic("login", [""]);
        }
    }
}
