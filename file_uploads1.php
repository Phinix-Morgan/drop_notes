<?php
$servername = "localhost";
$username ="root";
$password="";
$database = "file_upload";
//creating database connection//
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
	die("failed to connect".mysqli_connect_error());
}



if(isset($_POST['submit'])){
	$fileCount= count($_FILES['file']['name']);
	for($i=0;$i<$fileCount;$i++){
		$filename = $_FILES["file"]["name"][$i];
		$sql= "INSERT INTO `file_upload`.`fileup` (`TITLE`, `IMG`) VALUES('$filename','$filename') ";
		if ($conn->query($sql) === TRUE) {
                        echo "File uploaded successfully!";
		}else{
			echo "ERROR !";
		}


		move_uploaded_file($_FILES['file']['tmp_name'][$i], 'media/'.$filename);
	}
}

?>





