# Controllers

## PageController

### Routes publiques

. `/`

- `/a-propos`

. `/contact`

. `/login`


## ProductCategoryController

### Routes publiques

- `/produits/:categorie`

### Routes privées

- `/admin/categories`
- `/admin/categories/ajouter`
- `/admin/categories/:id/details`
- `/admin/categories/:id/modifier`
- `/admin/categories/:id/supprimer`


## ProductController

### Routes publiques

- `/produits`
- `/produits/:id`

### Routes privées

- `/admin/produits`
- `/admin/produits/ajouter`
- `/admin/produits/:id/details`
- `/admin/produits/:id/modifier`
- `/admin/produits/:id/supprimer`



## ImageController

### Routes privées

- `/admin/images`
- `/admin/images/ajouter`
- `/admin/images/:id/supprimer`

## OrderController

### Routes privées

. `/admin/all-orders`

. `/admin/all-orders/ajouter`

. `/admin/all-orders/:id/details`

. `/admin/all-orders/:id/modifier`

. `/admin/all-orders/:id/supprimer`

