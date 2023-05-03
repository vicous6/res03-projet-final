<?php

Class Image {
    
    //private attribute
    private ?int $id;
    private string $description;
    private string $url;
    private string $productName;
    
    



    //public constructor
    public function __construct(string $description ,string $url, string $productName)
    {
        $this->id = null;
        $this->description = $description;
        $this->url = $url;
        $this->productName = $productName;
        
          
          
    }
    
    
    
    
     public function getId() : ?int
    {
        return $this->id;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }
    public function getUrl() : string
    {
        return $this->url;
    }
    
    
    public function getProductName() : string
    {
        return $this->productName;
    }

    
    
    //public setter
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }
     public function setProductName(string $productName) : void
    {
        $this->productName = $productName;
    }
}
    
   
    