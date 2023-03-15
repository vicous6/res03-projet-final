function create() {

    let button = document.getElementById("registerBoutton")


    button.addEventListener("click", function(event) {
        event.preventDefault()
        let inputs = document.getElementsByTagName("input")

        console.log(inputs[0].value)


        let user = {
            username: inputs[0].value,
            firstName: inputs[2].value,
            lastName: inputs[3].value,
            email: inputs[1].value
        };

        // Je dois d'abord instancier un FormData qui est la reprÃ©sentation en JavaScript d'un formulaire
        let formData = new FormData();
        formData.append('username', user.username);
        formData.append('firstName', user.firstName);
        formData.append('lastName', user.lastName);
        formData.append('email', user.email);

        const options = {
            method: 'POST',
            body: formData
        };

        fetch('https://victoroustiakine.sites.3wa.io/res03-php-j19-api/register', options)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            });

        setTimeout(window.location.href = "https://victoroustiakine.sites.3wa.io/res03-phpjs-j19-admin/users.html", 1000)



    });
}

export { create };