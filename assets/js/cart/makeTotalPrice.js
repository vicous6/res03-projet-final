function total (){
    
    let prices = document.getElementsByClassName("prix");
    let displayTotal = document.getElementById("cart-total-price")
      let taxeContainer = document.getElementById("cart-tax-price");
      
    console.log(prices);
    let total = 0.0;
    for(let i = 0 ; i < prices.length ; i++){
        
     
        let length = prices[i].innerHTML.length
        let StringOfNumber = []
        console.log(length)
        for(let j = 0 ; j < length; j ++){
            
            // console.log(prices[i].innerHTML[j])
            if(prices[i].innerHTML[j] !== " "){
                
                StringOfNumber+=prices[i].innerHTML[j]
                console.log(StringOfNumber)
            }else{
                let value = parseFloat(StringOfNumber)
                total += value;
                // console.log(value, total)
                break
            }
        }
        
        
        // total += parseInt( prices[i].innerHTML)
    }
    let taxPourcent = 1.20
    let shipPrice = 8
    let taxesValue = calculateTax(taxPourcent,total.toFixed(2))
    console.log(total)
    taxeContainer.innerHTML= taxesValue.toFixed(2)+" euros"
    
    
    displayTotal.innerHTML= (total+shipPrice).toFixed(2)+" euros"
    
    
}



// % de tax en paramètre, montant total hors taxes
function calculateTax(pourcent,totalTTC){
  
    
    let TaxeValue =  totalTTC-totalTTC /pourcent
    
    
   return TaxeValue 
}


export { total };