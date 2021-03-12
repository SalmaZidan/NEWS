<?php 

include_once"Database.php"; 

class NEWS extends Database
{

    var $title;
    var $description;
    var $Category;
    var $image;
    var $Important;

    public function setTitle($t){
        $this->title=$t;
    }
    public function setdescription($t){
        $this->description=$t;
    }
    public function setCategory($t){
        $this->Category=$t;
    }
    public function setimage($t){
        $this->image=$t;
    }
    public function setImportant($t){
        $this->Important=$t;
    }
    

    public function getTitle(){
        return $this->title;
    }
    public function getdescription(){
        return $this->description;
    }
    public function getCategory(){
        return $this->Category;
    }
    public function getimage(){
        return $this->image;
    }
    public function getImportant(){
        return $this->Important;
    }
    

    function add()
    {
        $add_new = parent::RunDML("insert into `new` ( `title`, `description`, `Category`, `image`, `Important`) VALUES ('".$this->getTitle()."','".$this->getdescription()."','".$this->getCategory()."','".$this->getimage()."','".$this->getImportant()."')");
        return $add_new;
    }

    function GetByCategory()
    {
        $movie_details = parent::GetData("select * from `new` where ( `Category` = ".$_GET["c_id"].") ");
        return $movie_details;
    }

    function GetByImportant()
    {
        $movie_details = parent::GetData("select * from `new` where ( `Important` = '1') ");
        return $movie_details;
    }

}



?>