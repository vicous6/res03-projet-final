<?php

Class User {
    
    //private attribute
    private ?int $id;
    private string $username;
    private string $email;
    private string $password;
    private int $number;
    private string $role;
    private ?string $facturation;
    private ?string $livraison;


    //public constructor
    public function __construct(string $username, string $email, string $password, int $number, string $role)
    {
        $this->id = null;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->number=$number;
        $this->role=$role;
        $this->facturation= null;
        $this->livraison=null;
        
    }

    //public getter
    
    public function getId() : ?int
    {
        return $this->id;
    }
     public function getUsername() : string
    {
        return $this->username;
    }
    public function getEmail() : string
    {
        return $this->email;
    }
    public function getPassword() : string
    {
        return $this->password;
    }
    
    public function getNumber() : int
    {
        return $this->number;
    }
     public function getRole() : string
    {
        return $this->role;
    }
    public function getFacturation() : ?string
    {
        return $this->facturation;
    }
    public function getLivraison() : ?string
    {
        return $this->livraison;
    }
    
    
    //public setter
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    public function setUsername(string $username) : void
    {
        $this->email = $username;
    }
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
    public function setNumber(int $number) : void
    {
        $this->number = $number;
    }
    public function setRole(string $role) : void
    {
        $this->role = $role;
    }
    public function setFacturation(string $facturation) : void
    {
        $this->facturation = $facturation;
    }
    public function setLivraison(string $livraison) : void
    {
        $this->livraison = $livraison;
    }
    
    
    
}

?>