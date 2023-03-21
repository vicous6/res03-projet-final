function total (){
    
    let prices = document.getElementsByClassName("prix");
    let displayTotal = document.getElementById("cart-total-price")
    console.log(prices);
    total = 0;
    for(let i = 0 ; i < prices.length ; i++){
        
        console.log(prices[i].innerHTML)
        total += parseInt( prices[i].innerHTML)
    }
    let total2 = total.toString()
    displayTotal.innerHTML= "Total = "+total2+" euros"
}

export { total };