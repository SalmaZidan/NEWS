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
          <a class="nav-link active" aria-current="page" href="/NEWS">Home</a>
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
        <a class="btn btn-outline-success" type="submit" href="New.php">Add</a>
      </form>
    </div>
  </div>
</nav>
    

<div class="container mt-5"> 

<h1>Latest NEWS </h1>
<?php 
        include_once "newdatabase.php";
        $table = new NEWS();
        $u = $table->GetByImportant();

        while($row = mysqli_fetch_assoc($u))
        {   
?>

    <div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img src="<?php echo($row['image']); ?>"  style="width:300px; hight:300px;" alt="">
        </div>
        <div class="card-block px-2">
            <h4 class="card-title mt-5"><?php echo($row['title']); ?></h4>
            <p class="card-text"><?php echo($row['description']); ?></p>
        </div>
        <div class="w-100"></div>
    </div><br>


<?php } ?>


<div>



<script type="text/javascript" src="js/jquery-1.8.0.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>