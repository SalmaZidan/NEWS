<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">NEWS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">

            <?php 
						include_once "category.php";
						$table = new category();
                        $u = $table->GetAll();

						while($row = mysqli_fetch_assoc($u))
						{
							
                       	

                            
			?>

<li><a class="dropdown-item" href="singleCategory.php?c_id=<?php echo($row['id']); ?>"><?php echo($row['name']); ?></a></li>


            <?php } ?>

          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <button class="btn btn-outline-success" type="submit">Add</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
<h1 class="mt-5">Add New One</h1>

<form method="post" enctype="multipart/form-data">
  <div class="mb-3 mt-5">
    <label class="form-label">Title:</label>
    <input type="text" class="form-control" name="Title">
  </div>
  <div class="mb-3">
    <label class="form-label">Description:</label>
    <textarea type="text" class="form-control" name="Description"></textarea>
  </div>

  <select class="form-select" aria-label="Default select example" name="category">
            <option selected>Choose</option>
            <?php 
						include_once "category.php";
						$table = new category();
                        $u = $table->GetAll();

						while($row = mysqli_fetch_assoc($u))
						{
							
                       	

                            
			?>

            <option value="<?php echo($row['id']); ?>"><?php echo($row['name']); ?></option>

            <?php } ?>
  
  </select><br>

  <div class="mb-3">
    <label class="form-label">Image:</label>
    <input  style="width:100%; border:1px;" type="file" name="file" />
  </div>


  <div class="form-check">
  <input class="form-check-input" type="checkbox" id="flexRadioDefault1" name="imp" value="1">
  <label class="form-check-label">
    Add to Important News
  </label>
  </div><br>


  <button type="submit" class="btn btn-primary" style="width:100%" name="savebtn">Add</button>


    <?php 
    
    if(isset($_POST["savebtn"]))
    {
        include_once "newdatabase.php";
        $table = new NEWS();

        $dir="newsImage/";
        $image=$_FILES['file']['name'];
        $temp_name = $_FILES['file']['tmp_name'];
        $extinion = pathinfo($filename, PATHINFO_EXTENSION);

        if($image!="")
        {
            $fdir = $dir.$image.$extinion;
            move_uploaded_file($temp_name, $fdir);
        }

        $image_ex = $dir.$image.$extinion;
        $table->setTitle($_POST["Title"]);
        $table->setdescription($_POST["Description"]);
        $table->setCategory($_POST["category"]);
        $table->setimage($image_ex);
        if($_POST["imp"] == 1){
            $table->setImportant($_POST["imp"]);
        }
        else{
            $table->setImportant(0);
        }

        
        $msg = $table->add();

        if($msg == "ok")
        {

            echo("<div class='alert alert-success'> Added succsuflly! </div>");
        }
        else
        {
            echo("<div class='alert alert-danger'> Error is : ".$msg."</div>");
        }
    }
    
    ?>
</form>
    
</div>


<script type="text/javascript" src="js/jquery-1.8.0.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>