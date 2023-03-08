<?php

abstract class AbstractController{
 


public function renderPublic(string $view, array $values) : void{
    
    $template= $view;
    $data=$values;
    require 'templates/layout.phtml';
}
public function renderPrivate(string $view, array $values) : void{
    
    $template= $view;
    $data=$values;
    require 'templates/admin-layout.phtml';
}


}
?>