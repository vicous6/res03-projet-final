export default class User {
    firstName;
    lastName;
    email;
    number;
    password;
    confirmPassword;

    constructor(firstName = "", lastName = "", number = "", email = "", password = "", confirmPassword = "") {
        this.firstName = firstName;
        this.lastName = lastName;
        this.number = number;
        this.email = email;
        this.password = password;
        this.confirmPassword = confirmPassword;
    }

    get firstName () {
      return this.firstName;
    }

    set firstName (firstName) {
        this.firstName = firstName;
    }

    get lastName () {
        return this.lastName;
    }

    set lastName (lastName) {
        this.lastName = lastName;
    }

    get email () {
        return this.email;
    }

    set email (email) {
        this.email = email;
    }
    get number () {
        return this.number;
    }

    set number (number) {
        this.number = number;
    }

    get password () {
        return this.password;
    }

    set password (password) {
        this.password = password;
    }

    get confirmPassword () {
        return this.confirmPassword;
    }

    set confirmPassword (confirmPassword) {
        this.confirmPassword = confirmPassword;
    }

    validateLogin() {
        
        if(this.isValidEmail(this.email) === false)
        {
            return "Attention au mail";
        }
        else if (this.isValidPassword(this.password) === false)
        {
            return "Attention au mot de passe";
        }else{
            return ""
        }
    }
    validateRegister() {
         if (this.isValidUsername(this.firstName) === false)
        {
            return "Attention à l'identifiant";
        }else
        if(this.isValidEmail(this.email) === false)
        {
            return "Attention au mail";
        }
        else if (this.isValidPassword(this.password) === false)
        {
            return "Attention au mot de passe";
        }
        else
        if(this.areValidPasswords(this.password,this.confirmPassword) === false)
        {
            return "Les mots de passes ne correspondent pas";
        }
        else
        if(this.isValidNumero(this.number) === false)
        {
            return "Attention au numero de telephone";
        }
        
        else{
            return ""
        }
    }
    
    
    
    
    

 isValidUsername(username) {
    
    return username.length!== 0;
}

 isValidEmail(email) {
    let emailRegex = /^\S+@\S+\.\S+$/;
    return emailRegex.test(email);
}

 isValidPassword(password) {
    return password.length >= 4;
}
 areValidPasswords(password, confirmPassword) {
    return password.length === confirmPassword.length;
}
 isValidNumero(number) {
    return number.length === 10;
}

}

