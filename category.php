<?php 

include_once"Database.php"; 

class category extends Database
{

    function GetAll()
    {
        $category = parent::GetData("select * from `category`");
        return $category;
    }

}



?>