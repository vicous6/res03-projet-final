<?php

abstract class AbstractAdminController{
 


public function renderAdmin(string $view, array $values) : void{
    
    $template= $view;
    $data=$values;
    require 'templates/admin-layout.phtml';
}



}
?>