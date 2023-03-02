# res03-projet-final


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
          

## Tables: User(id, email, password, role)
    User (id, email, password, role)
    Product(id, name, description, url-photo, prix, category_id)
    Category(id, name)
    Materials(id, name)
    
    Orders:(id,facturation_address, livraison_address, total_price, Date, isPayed?, isSend?, user_id)
         
    Tables de liaisons: 


    Product-orders(product_id,order_id)
    Product-materials(product_id,materials_id)
    
## Controller


## Managers
   User-manager
   
     getAllUsers()
     getUserById(int $id)
     getUserByEmail(User $user)
     updateUser(User $user)
     deleteUser(int $id)
     
   Product-manager
   
     getAllProducts()
     getById(int $id)
     getProductByEmail(Product $product)
     updateProduct(Product $product)
     deleteProduct(int $id)
     
   Category-manager
   
     getAllCategories()
     getCategoryById(int $id)
     getCategoryByEmail(Category $category)
     updateCategory(Category $category)
     deleteCategory(int $id)
     
   Material-manager
     
     getAllMaterials()
     getMaterialById(int $id)
     getMaterialByEmail(Material $material)
     updateMaterial(Material $material)
     deleteMaterial(int $id)
     
   Order-manager
   
     getAllOrder()
     getOrderById(int $id)
     getOrderByEmail(Order $order)
     updateOrder(Order $order)
     deleteOrder(int $id)
     
                 
                      
