function total() {

    let prices = document.getElementsByClassName("prix");
    let displayTotal = document.getElementById("cart-total-price")
    let taxeContainer = document.getElementById("cart-tax-price");
    let total = 0.0;
        
    for (let i = 0; i < prices.length; i++) {


        let length = prices[i].innerHTML.length
        let StringOfNumber = []
        for (let j = 0; j < length; j++) {

            if (prices[i].innerHTML[j] !== " ") {

                StringOfNumber += prices[i].innerHTML[j]

            }
            else {

                let value = parseFloat(StringOfNumber)
                total += value;

                break
            }
        }

    }

    let taxPourcent = 1.20
    let shipPrice = 8
    let taxesValue = calculateTax(taxPourcent, total.toFixed(2))
    console.log("montant de taxe :  " + taxesValue)
    console.log("montant ht" + total)
    console.log("frais d'envoie : " + shipPrice)
    taxeContainer.innerHTML = taxesValue.toFixed(2) + " euros"
    console.log(total + shipPrice + taxesValue)
    if (total + shipPrice + taxesValue === 8) {
        displayTotal.innerHTML = "0.00" + " euros"
    }
    else {
        console.log((total + shipPrice + taxesValue).toFixed(2) + " euros")
        displayTotal.innerHTML = (total + shipPrice + taxesValue).toFixed(2) + " euros"
    }




}



// % de tax en paramètre, montant total hors taxes
function calculateTax(pourcent, totalTTC) {


    let TaxeValue = totalTTC - totalTTC / pourcent


    return TaxeValue
}


export { total };
