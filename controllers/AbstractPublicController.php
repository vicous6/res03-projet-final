<?php

abstract class AbstractPublicController{
 


public function renderPublic(string $view, array $values) : void{
    
    $template= $view;
    $data=$values;
    require 'templates/layout.phtml';
}
public function clean($data): string{
    
     $safeCode = htmlspecialchars($data);
     return $safeCode;
}


}
?>