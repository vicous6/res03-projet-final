<?php

Class User {
    
    //private attribute
    private ?int $id;
    private string $email;
    private string $password;
    private string $number;
    private array $role;
    private array $facturation;
    private array $livraison;


    //public constructor
    public function __construct(string $email, string $password, string $number)
    {
        $this->id = null;
        $this->email = $email;
        $this->password = $password;
        $this->address=$number;
        $this->roles=[];
        $this->facturation=[];
        $this->livraison=[];
        
    }

    //public getter
    
    public function getId() : ?int
    {
        return $this->id;
    }
    public function getEmail() : string
    {
        return $this->email;
    }
    public function getPassword() : string
    {
        return $this->password;
    }
     public function getAddress() : ?string
    {
        return $this->address;
    }
    public function getNumber() : int
    {
        return $this->number;
    }
     public function getRoles() : array
    {
        return $this->roles;
    }
    public function getFacturation() : array
    {
        return $this->facturation;
    }
    public function getLivraison() : array
    {
        return $this->livraison;
    }
    
    
    //public setter
    
    public function setId(int $id) : void
    {
        $this->id = $id;
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
    public function setRole(array $role) : void
    {
        $this->role = $role;
    }
    public function setFacturation(array $facturation) : void
    {
        $this->facturation = $facturation;
    }
    public function setLivraison(array $livraison) : void
    {
        $this->livraison = $livraison;
    }
    
    
    
}

?>