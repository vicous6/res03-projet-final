function initCart() {

   
let buttons = document.getElementsByClassName("paniers");
      
    for(let i = 0 ; i < buttons.length ; i++){
        
        let id = buttons[i].getAttribute("product")
        buttons[i].addEventListener("click",function(){
            
           
               fetch(`/res03-projet-final/addPanier/${id}`);
            setTimeout(() => {
  window.location.href=("/res03-projet-final/monPanier");
}, "1000")
            
        })
    }
    
}

export { initCart };


