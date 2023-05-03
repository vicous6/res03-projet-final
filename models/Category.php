<?php
class Category {
    
    //private attribute
    private ?int $id;
    private string $title;
    



    //public constructor
public function __construct(string $title)
{
    $this->id = null;
    $this->title = $title;
    
}

    //public getter
    
    public function getId() : ?int
    {
        return $this->id;
    }
    
    public function getTitle() : string
    {
        return $this->title;
    }
    
  
    
    
    //public setter
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
    
}

?>