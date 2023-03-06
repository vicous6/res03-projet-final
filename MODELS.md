## Models

# User

- id
- username
- email
- password
- role []
- number

# Order

-id
-total_price
-date
-isPayed?
-isSent?
-user_id
-product[]

# Product

-id
-name
-description
-prix
-category_id
-stock
-material[]


# Material

-   id
- name
- product[]


# Category

-   id
- name

# Image

-   id
- product_id
- description
- url

# Address
-id 
-number 
-road
-zip_code
-city
-country
-user_id
