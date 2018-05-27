<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>


<?php

	$db = new Database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Books Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                <ul class="dropdown-menu">
					<?php
						$query="select * from tbl_category";
						$post=$db->select($query);
						if($post)
						{
							while($result=$post->fetch_assoc())
							{
					?>
                  				<li><a href="booklist.php?catId=<?php echo $result['catId']; ?>"> <?php echo $result['catName']; ?> </a></li>
                  	<?php 
							}
						}
					?>
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Branch <span class="caret"></span></a>
                <ul class="dropdown-menu">
					<li><a href="branch.php">Branch-1</a></li>
					<li><a href="branch.php">Branch-2</a></li>
					<li><a href="branch.php">Branch-3</a></li>
					<li><a href="branch.php">Branch-4</a></li>
                </ul>
            </li>
          </ul>
          <div class="col-sm-3 col-md-3">
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="name" required="required">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </nav>