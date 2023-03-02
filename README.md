# res03-projet-final


# Site vente de bijoux


## Fonctionnalité:

    Selectioner un produit, l'ajouter au panier, valider la panier , payement via Stripe





## Technologie: 
          Html, SASS, JS , PHP , MYSQL

## Pages :
          User: Acceuil , Gallerie , Contact , Login  , 404 ,
          Admin: 
          

## Tables: User(id, email, password, role)
    Product(id, name, description, url-photo, prix, category_id, material_id, panier_id)
    Category(id, name)
    Materials(id, name)
    
    Orders:(id,facturation_address, livraison_address, total_price, Date, isPayed?, isSend?)
         
    Tables de liaisons: 

    

    Product-orders(product_id,order_id)
    Product-category(product_id,category_id)
    Product-materials(product_id,materials_id)
                 
                      
