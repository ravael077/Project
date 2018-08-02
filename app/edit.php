<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE members SET name='$name',alamat='$alamat',nohp='$nohp',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM members WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$alamat = $res['alamat'];
	$nohp = $res['nohp'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
			</tr>			
			<tr> 
				<td>No.HP</td>
				<td><input type="text" name="nohp" value="<?php echo $nohp;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
