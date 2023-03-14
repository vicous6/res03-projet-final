# res03-projet-final

A FAIRE POUR LE DEPLOIEMENT
-> changer l'url de l'explode dans js


# Site vente de bijoux

## Description

Ce site sera une boutique en ligne de bijoux artisanaux, il sera possible de selectionner un/des produits et de faire le reglement directement à partir du site.
Un CRUD sera implémenté pour l'administrateur.

## Fonctionnalités:

 Selectioner un produit, l'ajouter au panier, valider la panier , payement via Stripe





## Technologie: 

 Html, SASS, JS , PHP , MYSQL

## Pages :
 User: Accueil , Gallerie , Contact , Login  , 404
          
                Routes: Accueil  -> /
                        Gallerie -> /gallerie
                        Contact  -> /contact
                        Login    -> /login
                
  Admin: All-products, new-product, update-product, all-orders
          
                Routes: All-products   -> /admin/all-products
                        New-product    -> /admin/new-product
                        Update-product -> /admin/update-product/{id}
                        All-orders     -> /admin/all-orders
          

## Tables: User(id, email, password, role) :

    User (id, email, password, role, number )
    
     **FacturationAddress** (id ,user_id ,number, road, zip_code , country)
    LivraisonAddress (id ,user_id, number, road, zip_code , country)
    
    Product(id, name, description, prix, category_id)
    
    Category(id, name)
    
    Material(id, name)
    
    Images(id, , product_id, url)
    
    -panier uniquement en session-
    
    
    Order(id, panier_id,facturation_address, livraison_address, total_price, Date, isPayed?, isSend? )
         
         
    Tables de liaisons: 
      
      Product-order(product_id,order_id)
      
      Product-material(product_id,material_id)
      
    
## Controller :
   
   AdminController
   
     All-products   -> /admin/all-products
     New-product    -> /admin/new-product
     Update-product -> /admin/update-product/{id}
     All-orders     -> /admin/all-orders
     
   PageController
   
     Accueil  -> /
     Gallerie -> /gallerie      -> affiche les produit , ces produit peuvent etre classés/filtrer et constituer un panier dans le local storage 
                  /gallerie/{id}-> affiche le dit produit dans une page dédié
      
      
     Contact  -> /contact
     Login    -> /login
     Register    -> /register
                  
      
      
   PanierController
    
      Gallerie -> /gallerie/panier
 

## Managers :

   User-manager
   
     getAllUsers() 
     getUserById(int $id)
     getUserByEmail(User $user)
     updateUser(User $user)
     deleteUser(int $id)
     createUser(User $user)
     
   Product-manager
   
     getAllProducts() -> join(category, material)
     getById(int $id)
     getProductByEmail(Product $product)
     updateProduct(Product $product)
     deleteProduct(int $id)
     createProduct(Product $product)
     
   Category-manager
   
     getAllCategories()
     getCategoryById(int $id)
     getCategoryByEmail(Category $category)
     updateCategory(Category $category)
     deleteCategory(int $id)
     createCategory(Category $category)
     
   Material-manager
     
     getAllMaterials()
     getMaterialById(int $id)
     getMaterialByEmail(Material $material)
     updateMaterial(Material $material)
     deleteMaterial(int $id)
     createMaterial(Material $material)
     
   Panier-manager
   
     getAllPaniers() (join -> product, 2nd join(material,category) ) 
     getPanierById(int $id)
     getPanierByEmail(Panier $panier)
     updatePanier(Panier $panier)
     deletePanier(int $id)
     createrPanier(Panier $panier)
     
   Image-Manager
     getAllImages() 
     getImageById(int $id)
     getImageByEmail(Image $Image)
     updateImage(Image $Image)
     deleteImage(int $id)
     createrImage(Image $Image)
     
    FacturationAddressManager
    
    LivraisonAddressManager
      
     
## models

User
   ?int $id
   string $username
   string $email
   string $password
   array $role[ ]
   string $number
   ?string $facturationAddress
   ?string $livraisonAddress
   
   __construct($username,$email,$password,$number){
   
   this->id= null,
   this->username=$username,
   this->email=$email,
   this->password=$password
   this->number=$number
   this->facturationAddress=$facturationAddress
   this->livraisonAddress=$livraisonAddress
   
   }
                      
