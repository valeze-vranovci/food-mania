<?php
		include('dbconn.php');
		
		$Firstname = $_POST['inputUserFirstName'];
		$Lastname = $_POST['inputUserLastName'];
		$Company = $_POST['inputKompania'];
		$DOB = $_POST['inputDOB'];
		$PhoneNumber = $_POST['inputPhone'];
		$Address = $_POST['inputAdresa'];
		$inputEmail = $_POST['inputEmail'];
		$inputPassword = md5($_POST['inputPassword']);
		
		$sql ="INSERT INTO users (Firstname, Lastname, Company, DOB, PhoneNumber, Address, inputEmail, inputPassword)
				VALUE ('$Firstname', '$Lastname', '$Company', '$DOB', '$PhoneNumber','$Address','$inputEmail', '$inputPassword')";
		
		  $query=mysqli_query($conn,$sql);
		
		if($query)
		{
			//Shfaq nje mesazh qe te dhenat u rujten me sukses dhe ridrejto ne index.php
			header( "refresh:1; url=../login.php" );
			
			
		}
		else{
			
				echo"<h1>Te dhenat nuk ruajten</h1>" or die ('invalid query:'. mysql_error());
			
		}
		?>
