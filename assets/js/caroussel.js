function caroussel(){
    
    
    let articles = document.getElementsByTagName("article");
     let tab =[];
     for(let i = 0 ; i < articles.length;i++){
         
         let truc = document.getElementsByClassName(`${i}`)
         tab.push(truc);
         console.log(truc)
         
        for(let j = 0 ; j < truc.length;j++){
             if(j!== 0 ){
          truc[j].style.display="none";  
        
         }
        }
     }
    //  recupère un tableau d'image pour chaque produit
    //  console.log(tab)
     
     
     
     
     
    let buttonCaroussel = document.getElementsByClassName("caroussel");
    
   for(let i = 0 ; i < buttonCaroussel.length; i ++){
       
        buttonCaroussel[i].style.position="absolute"
        buttonCaroussel[i].addEventListener('click',function(){
            
            // console.log(tab[i])
            
            
                
                // if(tab[i].length>1){
                    for(let j=0 ; j< tab[i].length;j++){
                        
                        console.log(tab[i][j])
                        if(tab[i][j].style.display!=="none" && j !==tab[i].length-1){
                            
                          tab[i][j].style.display="none";
                           
                            tab[i][j+1%tab[i].length].style.display='';
                            
                            break;
                    
                             }else if(tab[i][j].style.display!=="none" && j ===tab[i].length-1){
                                 
                                 tab[i][j].style.display="none";  
                                  tab[i][0].style.display='';
                             }
                        }
                        
                    })
                    
                    
                    
                // }
                
                
                
            
            
            
        }
}

export { caroussel }