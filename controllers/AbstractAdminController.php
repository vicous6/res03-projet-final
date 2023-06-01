<?php

abstract class AbstractAdminController{
 


public function renderAdmin(string $view, array $values) : void{
    
    $template= $view;
    $data=$values;
    require 'templates/admin/layoutAdmin.phtml';
}

public function clean($data): string{
    
     $safeCode = htmlspecialchars($data);
     return $safeCode;
}


}
?>