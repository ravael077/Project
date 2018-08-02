<html>
<head>
	<title>Tambah Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
	$nohp = mysqli_real_escape_string($mysqli, $_POST['nohp']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// checking empty fields
	if(empty($name) || empty($alamat) || empty($nohp) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Kolom nama kosong.</font><br/>";
		}
		
		if(empty($alamat)) {
			echo "<font color='red'>Kolom alamat kosong.</font><br/>";
		}
		
		if(empty($nohp)) {
			echo "<font color='red'>Kolom No.HP kosong.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Kolom emali kosong.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO members(name,alamat,nohp,email) VALUES('$name','$alamat','$nohp','$email')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
