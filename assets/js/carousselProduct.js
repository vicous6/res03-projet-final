function carousselProduct() {


    let articles = document.getElementsByTagName("article");



    let tab = document.getElementsByClassName(`image`)


    for (let j = 0; j < tab.length; j++) {
        if (j !== 0) {
            tab[j].style.display = "none";


        }
    }
    //  recupère un tableau d'image pour chaque produit
    //  console.log(tab)





    let buttonCaroussel = document.getElementsByClassName("caroussel");

    for (let i = 0; i < buttonCaroussel.length; i++) {

        buttonCaroussel[i].style.position = "absolute"
        buttonCaroussel[i].addEventListener('click', function() {

            // tab = liste des balise qui contiennent les images
            console.log(tab)
            for (let j = 0; j < tab.length; j++) {

                console.log(tab[j])
                if (tab[j].style.display !== "none" && j !== tab.length - 1) {

                    tab[j].style.display = "none";

                    tab[j + 1 % tab.length].style.display = '';

                    break;

                }
                else if (tab[j].style.display !== "none" && j === tab.length - 1) {

                    tab[j].style.display = "none";
                    tab[0].style.display = '';
                }
            }

        })



        // }






    }
}

export { carousselProduct }