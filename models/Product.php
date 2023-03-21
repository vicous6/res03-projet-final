<?php

Class Product {
    
    //private attribute
    private ?int $id;
    private string $name;
    private string $description;
    private float $prix;
    private int $stock;
    private string $category;
    private array $materials;
    private array $images;
    



    //public constructor
    public function __construct(string $name, string $description, float $prix,int $stock,string $category)
    {
        $this->id = null;
        $this->name = $name;
        $this->description = $description;
        $this->prix = $prix;
         $this->stock = $stock;
          $this->category = $category;
          $this->materials=[];
          $this->images=[];
          
          
    }
    
    public function test() {
		return  get_object_vars($this);
	}
    
    
     public function getId() : ?int
    {
        return $this->id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    
    public function getDesciption() : string
    {
        return $this->description;
    }
    public function getPrix() : int
    {
        return $this->prix;
    }
    public function getStock() : int
    {
        return $this->stock;
    }
    
    
    public function getCategory() : string
    {
        return $this->category;
    }
    public function getImages() : array
    {
        return $this->images;
    }
    public function getMaterials() : array
    {
        return $this->materials;
    }

    
    
    //public setter
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    public function setDescription(string $description) : void
    {
        $this->description = $descrition;
    }
    public function setPrix(string $prix) : void
    {
        $this->prix = $prix;
    }
    public function setStock(string $name) : void
    {
        $this->stock = $stock;
    }
    
    public function setCategory_id(string $category) : void
    {
        $this->category = $category;
    }
    
    
    public function addMaterial(string $material){
        
        array_push($this->materials, $material);
    }
    public function addImages(string $image){
        
        array_push($this->images, $image);
    }
    
   
    
    
    
    
    
    
    
    
    
    
}
