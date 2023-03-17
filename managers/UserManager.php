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
    
    
public function getAllUsers():array{
    	
    	  $query = $this->db->prepare('SELECT * FROM user');
	$parameters = [
	    
	];
$query->execute($parameters);
$users = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($users);
 $tab= [];
        foreach($users as $user){
            
            
            
            $new = new User($user["username"],
            $user["email"],
            $user["password"],
            $user["phone_number"]
            ,$user["role"]);
        $new->setId($user["id"]);
        
        array_push($tab, $new);
        
        }
        return $tab;
    }
    
    
public function getUserByEmail(string $email) : ?User
    {
        
       $query = $this->db->prepare('SELECT * FROM user WHERE email = :email');
	$parameters = [
	    "email"=>$email
	];
$query->execute($parameters);
$user = $query->fetch(PDO::FETCH_ASSOC);
if($user ===false || $user === null){
	
	return null;
}
$theUser = new User ($user["username"],$user["email"],$user["password"],$user["phone_number"],$user["role"]);

return $theUser;

        }

public function deleteUserById(string $id): void{
    
    
        
         $query= $this->db->prepare("DELETE FROM user WHERE id=:value");
        $parameters = [
        'value' => $id,
        ];
        $query->execute($parameters);
        
        
    }
}