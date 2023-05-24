import User from "/res03-projet-final/assets/js/User.js";

function validateRegisterForm(){

  let form = document.getElementById("register");

  form.addEventListener("submit", function(event){

      

       
       
         let user = new User();
         
      user.firstName = document.getElementById("registerUsername").value;
       user.number = document.getElementById("number").value;
       user.email = document.getElementById("registerEmail").value;
       user.password = document.getElementById("registerPassword").value;
      user.confirmPassword = document.getElementById("registerConfirmPwd").value;
 
         if(user.validateRegister() !== "")
      {
          event.preventDefault(); // empecher la soumission
          // afficher une erreur sur le formulaire
          document.getElementsByTagName("h3")[0].innerHTML= user.validateRegister();
      }

     
  });
}



export { validateRegisterForm }