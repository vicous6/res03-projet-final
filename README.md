# res03-projet-final


# Site vente de bijoux


## Fonctionnalités:

    Selectioner un produit, l'ajouter au panier, valider la panier , payement via Stripe





## Technologie: 
          Html, SASS, JS , PHP , MYSQL

## Pages :
          User: Accueil , Gallerie , Contact , Login  , 404 ,
          
                Routes: Accueil  -> /
                        Gallerie -> /gallerie
                        Contact  -> /contact
                        Login    -> /login
                
          Admin: All-products, new-product, update-product, all-orders
          
                Routes: All-products   -> /admin/all-products
                        New-product    -> /admin/new-product
                        Update-product -> /admin/update-product
                        All-orders     -> /admin/all-orders
          

## Tables: User(id, email, password, role)
    Product(id, name, description, url-photo, prix, category_id)
    Category(id, name)
    Materials(id, name)
    
    Orders:(id,facturation_address, livraison_address, total_price, Date, isPayed?, isSend?)
         
    Tables de liaisons: 

    Product-orders(product_id,order_id)
    Product-materials(product_id,materials_id)
##
                 
                      
