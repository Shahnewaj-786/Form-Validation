<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	




<?php

// since 1970 to be continue -> echo time();
// random number genarate -> echo rand();


if (isset ($_POST['Submit'])){

     $Name = $_POST['Name'];
     $Email = $_POST['Email'];
	 $Phone = $_POST['Phone'];
	
	      $Phone_len = strlen($Phone);

 $file_name = $_FILES ['Photo'] ['name'];
 $file_size = $_FILES ['Photo'] ['size'];
 $file_type = $_FILES ['Photo'] ['type'];
 $file_tmp = $_FILES ['Photo'] ['tmp_name'];
    
 $unique_file_name = md5(time(); . rand() . $file_name);  //this is for temp solution for same name file upload.

move_uploaded_file($file_tmp, 'photo/'.  $unique_file_name);



    if(empty($Name) || empty($Email) || empty($Phone)){

        
        $txt= "<p class='alert alert-danger'> Please Fill up every information <button class='close' data-dismiss='alert'> &times </button> </p>";
    }elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){

//we can use !filter_var as above or -> elseif(filter_var($Email, FILTER_VALIDATE_EMAIL)==false)

        $txt = "<p style='color:red;'> Invalid Email Address </p>";

    }elseif($Phone_len != 11){

		$txt = "<p style='color:red;'> Invalid Phone Number </p>";

	}else{
        $txt= "<p class='alert alert-success'> All done, Thank You! <button class='close' data-dismiss='alert'> &times </button> </p>";
    }


}else{
    echo ("No Data Found");
}



?>



	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Add New Student</h2>
				<?php
            
            if(isset($txt)){
                echo $txt;
            }
            
            ?>
				<form action="" method="POST" enctype="multipart/form-data">
					
					<div class="form-group">
						<label for="">Name</label>
						<input name= "Name" type="text" placeholder = "Name">    
					</div>
					
					
					<div class="form-group">
						<label for="">Email</label>
						<input name= "Email" type="text" placeholder = "Email"> 
					</div>
					
					
					<div class="form-group">
						<label for="">Phone</label>
						<input name= "Phone"  type="text" placeholder = "Phone">  
					</div>
					
					
					<div class="form-group">
						<label for="">Photo</label>
						<input name="Photo" class="form-control" type="file">
					</div>
					
					
					<div class="form-group">
					<input name= "Submit" type="submit" value = "Log In">   
					</div>


				</form>
			</div>
		</div>
	</div>
	
<br>








	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>