function caroussel() {


    let articles = document.getElementsByTagName("article");
    let tab = [];
    for (let i = 0; i < articles.length; i++) {

        let truc = document.getElementsByClassName(`${i}`)
        tab.push(truc);
        

        for (let j = 0; j < truc.length; j++) {
            if (j !== 0) {
                truc[j].style.display = "none";

            }
        }
    }
    //  recupère un tableau d'image pour chaque produit








    let buttonCaroussel = document.getElementsByClassName("caroussel");

    for (let i = 0; i < buttonCaroussel.length; i++) {

        buttonCaroussel[i].style.zIndex = 1000
        buttonCaroussel[i].addEventListener('click', function() {


            for (let j = 0; j < tab[i].length; j++) {


                if (tab[i][j].style.display !== "none" && j !== tab[i].length - 1) {

                    tab[i][j].style.display = "none";

                    tab[i][j + 1 % tab[i].length].style.display = '';

                    break;

                }
                else if (tab[i][j].style.display !== "none" && j === tab[i].length - 1) {

                    tab[i][j].style.display = "none";
                    tab[i][0].style.display = '';
                }
            }

        })



        // }






    }
}

export { caroussel }