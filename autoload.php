<?php
require "services/Router.php";
require "models/User.php";
require "models/Product.php";
require "models/Image.php";

require "controllers/AbstractPublicController.php";
require "controllers/AbstractAdminController.php";


require "controllers/admin/CategoryController.php";
require "controllers/admin/ImageController.php";
require "controllers/admin/OrderController.php";
require "controllers/admin/ProductAdminController.php";
require "controllers/admin/UserController.php";
require "controllers/public/LoginController.php";


require "controllers/public/PageController.php";
require "controllers/public/ProductPublicController.php";


require "managers/AbstractManager.php";
require "managers/UserManager.php";
require "managers/ProductManager.php";
require "managers/ImageManager.php";




