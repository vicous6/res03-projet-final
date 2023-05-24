import User from "/res03-projet-final/assets/js/User.js";

function validateLoginForm(){
console.log("ok")
  let form = document.getElementById("login");

  form.addEventListener("submit", function(event){

      let user = new User();
       user.email = document.getElementById("email").value;
       user.password = document.getElementById("password").value;
 
         if(user.validateLogin() !== "")
      {
          event.preventDefault(); // empecher la soumission
          // afficher une erreur sur le formulaire
          document.getElementsByTagName("h3")[0].innerHTML= user.validateLogin();
      }
  });
}



export { validateLoginForm }