<?php 

class UserManager extends AbstractManager {
    
public function createUser(User $user): void{
        
    $query = $this->db->prepare('INSERT INTO user VALUES (null, :username,:email,:password,:role,:number,null,null)');

    	$parameters = [
    	     "username"=>$user->getUsername(),
	    "email"=>$user->getEmail(),
	    "role"=>$user->getRole(),
	    "password"=>$user->getPassword(),
	    "number"=>$user->getNumber(),
	   
	];
	
$query->execute($parameters);
    }
public function getUserByEmail(string $email) : User
    {
        
       $query = $this->db->prepare('SELECT * FROM user WHERE email = :email');
	$parameters = [
	    "email"=>$email
	];
$query->execute($parameters);
$user = $query->fetch(PDO::FETCH_ASSOC);

$theUser = new User ($user["username"],$user["email"],$user["password"],$user["phone_number"],$user["role"]);

return $theUser;

        }
}