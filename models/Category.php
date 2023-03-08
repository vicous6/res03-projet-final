<?php
class Category {
    
    //private attribute
    private ?int $id;
    private string $title;
    private array $salon;



    //public constructor
public function __construct(string $title)
{
    $this->id = null;
    $this->title = $title;
    $this->salon = [];
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
    
    public function getSalon() : array
    {
        return $this->salon;
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
    
    public function setSalon(array $salon) : void
    {
        $this->salon = $salon;
    }
    
    
    public function addSalonInCategories(Salon $salon) : void
    {
        
        array_push($this->salon, $salon);
        
    }
}

?>