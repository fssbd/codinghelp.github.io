<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>


<?php

	$db = new Database();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<title>All Service</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  	<link rel="stylesheet" type="text/css" href="css/registerStyle.css"/>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up for All Service <small>It's free!</small></h3>
			 			</div>
			 			<div class="panel-body">
<?php


	if($_SERVER['REQUEST_METHOD']=='POST')
	{			
		$fullName=$_POST['fullName'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$country=$_POST['country'];
		$mobile=$_POST['mobile'];
		$serviceId=$_POST['serviceId'];
		$password=$_POST['password'];
		$passwordCinfirm=$_POST['passwordConfirm'];

		/*$bookName=mysqli_real_escape_string($db->link,$bookName);*/

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "images/".$unique_image;


		if($password==$passwordCinfirm)
		{
			if(!empty($file_name))
			{
				if($file_size <1048567)
				{
					if(in_array($file_ext, $permited) === true)
					{
						move_uploaded_file($file_temp, $uploaded_image);
						$query="insert into tbuserinfo (fullName, email, gender, country, mobile, serviceId, serviceName, password, image) 
						values(
						'$fullName',
						'$email',
						'$gender',
						'$country',
						'$mobile',
						'$serviceId',
						(select serviceName from tbService where serviceId='$serviceId'),
						'$password',
						'$uploaded_image')";

						$insertData=$db->insert($query);
						if($insertData)
						{
							echo "<span style='color:green;font-size:18px;'>Registration Information Inserted Successfully.</span>"; 
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>Registration Information Not Inserted !</span>";
						}
					}
					else
					{
						echo "<span style='color:green;font-size:18px;'>You can upload only:-".implode(', ', $permited)."</span>";
					}
				}
				else
				{
					echo "<span style='color:green;font-size:18px;'>Image Size should be less then 1MB!</span>";
				}
			}
			else
			{
				echo "<span style='color:red;font-size:18px;'>Image must not be empty</span>";
			}
		}
		else
		{
			echo "<span style='color:red;font-size:18px;'>Password Not Match</span>";
		}
	}
?> 
		    		
		    		
			    		<form action="" method="post" enctype="multipart/form-data">
			    		
			    			<div class="form-group">
			    				<input type="text" name="fullName" id="fullName" class="form-control input-sm" placeholder="Full Name" required>
			    			</div>
			    			
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required>
			    			</div> 
			    			
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
									<select class="form-control" name="gender">
										<option selected="0"> Select Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="country" id="country" class="form-control input-sm" placeholder="Country" required>
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<div class="form-group">
			    				<input type="text" name="mobile" id="mobile" class="form-control input-sm" placeholder="Mobile No." required>
			    			</div>
			    			
			    			<div class="form-group">
			    				<select class="form-control" name="serviceId">
										<option selected="0"> Select Service Type</option>
										<?php
											$query="select serviceId,serviceName from tbservice";
											$selectData=$db->select($query);
											if($selectData)
											{
												while($result=$selectData->fetch_assoc())
												{

										?>
											<option value="<?php echo $result['serviceId']; ?>"><?php echo $result['serviceName']; ?></option>
										<?php
												}
											}
										?>
									</select>
			    			</div> 
			    			
			    			
			    			
			    			<div class="row">
			    				<div class="col-xs-5 col-sm-5 col-md-5">
			    					<div class="form-group">
			    						<label>Upload Image</label>
			    					</div>
			    				</div>
			    				<div class="col-xs-7 col-sm-7 col-md-7">
			    					<div class="form-group">
			    						<input name="image" type="file" />
			    					</div>
			    				</div>
			    			</div>
			    			
			    			
			    			

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-sm" placeholder="Confirm Password" required>
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    			<br>
    						<p class="text-center">Have an account? <a href="login.php">Log In</a> </p>  
			    		</form>
			    		
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
	
	
</body>
</html>