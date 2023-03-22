function total (){
    
    let prices = document.getElementsByClassName("prix");
    let displayTotal = document.getElementById("cart-total-price")
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
                console.log(value, total)
                break
            }
        }
        
        
        // total += parseInt( prices[i].innerHTML)
    }
    
    displayTotal.innerHTML= "Total = "+total.toFixed(2)+" euros"
}

export { total };