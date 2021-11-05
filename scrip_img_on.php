<?php
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username="u481158665_img_copie_coll";
$password ="v3p9r3e@59A";
$link_datas =$_POST["link_datas"] ;
$page_web_datas =$_POST["page_web_datas"] ;
$name_datas =$_POST["name_datas"] ;
$dbname = $username ; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM `datas` WHERE `link_datas`="'.$link_datas.'"';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {   
  }
} else {
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }	  
	  $sql = "INSERT INTO datas (link_datas,page_web_datas,name_datas)
	  VALUES ('$link_datas', '$page_web_datas', '$name_datas')";
	  
	  if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
	  
	  $conn->close() ; 
}
$conn->close();
?>