import { create } from "/res03-projet-final/assets/js/create-user.js";
import { caroussel } from "/res03-projet-final/assets/js/caroussel.js";
import { carousselProduct } from "/res03-projet-final/assets/js/carousselProduct.js";
import { total } from "/res03-projet-final/assets/js/cart/makeTotalPrice.js";
import { initCart } from "/res03-projet-final/assets/js/cart/cart.js";

window.addEventListener("DOMContentLoaded",function(){
    
//   console.log(window.location.href)
    initCart();
    // creer la route vers create User
 
 
 if(window.location.href === "https://victoroustiakine.sites.3wa.io/res03-projet-final/produits"){
 
    caroussel()
    
   }
   let truc = window.location.href;
   let route = truc.split("/");
   console.log(route)
//   exemple : res03-projet-final/produit/{id}


   if(route[route.length-2]=== "produit" && route[route.length-3]==="res03-projet-final"){
       
    carousselProduct()
    console.log("oucou")
   }
   if("https://victoroustiakine.sites.3wa.io/res03-projet-final/monPanier"){
 
    total()
    
   }
   
 
     
     
     
     
     
    
})