import { create } from "/res03-projet-final/assets/js/create-user.js";
import { caroussel } from "/res03-projet-final/assets/js/caroussel.js";
import { carousselProduct } from "/res03-projet-final/assets/js/carousselProduct.js";
import { total } from "/res03-projet-final/assets/js/cart/makeTotalPrice.js";
import { initCart } from "/res03-projet-final/assets/js/cart/cart.js";
import { initHeader } from "/res03-projet-final/assets/js/initHeader.js";
window.addEventListener("DOMContentLoaded",function(){
    
//   console.log(window.location.href)
    initCart();
    // creer la route vers create User
 
  initHeader();

   let truc = window.location.href;
   let route = truc.split("/");
//   exemple : res03-projet-final/produit/{id}

 if(window.location.href === "https://victoroustiakine.sites.3wa.io/res03-projet-final/produits"){
 
    caroussel()
    
   }else
   if(route[route.length-2]=== "produit" && route[route.length-3]==="res03-projet-final"){
       
    carousselProduct()
  
   }else
   if(window.location.href === "https://victoroustiakine.sites.3wa.io/res03-projet-final/monPanier"){
 
    total()
    
   }else
   
   if(route[route.length-3]==="res03-projet-final"&& route[route.length-2]=== "produits"){
       
       caroussel()
       
   }
   
 
     
     
     
     
     
    
})