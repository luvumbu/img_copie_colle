<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>







<?php




 
 // 
$tab = "";

for($i=strlen($_SERVER['PHP_SELF']);$i>0;$i--){
 
 
  if($_SERVER['PHP_SELF'][$i]=="/"){ 
    break; 
  }
  else {
    $tab = strrev($_SERVER['PHP_SELF'][$i]).$tab;
  }
}
 
$servername = "localhost";
$username="u481158665_img_copie_coll";
$password ="v3p9r3e@59A";
$dbname = $username ; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$tab_= $tab*10;
$sql = "SELECT * FROM `datas` WHERE 1 LIMIT $tab_,10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  echo '<div id="display_flex">';
  while($row = $result->fetch_assoc()) {
   
    ?>
<div class="card space" style="width: 18rem;">
  <img src="<?php echo $row["link_datas"]; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row["page_web_datas"]; ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="<?php echo $row["link_datas"]; ?>" class="btn btn-primary">Agrandir image</a>
  </div>
</div>
<?php 
  }
  echo '</div>'; 
} else {
  echo "0 results";
}
$conn->close();


// demande valeur max 

$max_id_datas; 
$total_page ; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT MAX(`id_datas`) FROM `datas` WHERE 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  //  echo "Valeur max: " . $row["MAX(`id_datas`)"] ; 
    $max_id_datas = $row["MAX(`id_datas`)"];
  }
} else {
  echo "0 results";
}
$conn->close();

 
// fin demande valeur max 
 
$total_page = (int) ( $max_id_datas/10 );
?>




<?php 

for($i = 0;$i<5;$i++){
?>

<?php 
}




$lien_page="https://bokonzi.com/img_copie_colle/index_b.php/";
?>





 
<style>
  #display_flex,.display_flex{
    display:flex ; 
    justify-content:space-around;
    
    flex-wrap:wrap ; 
  }
  .space{
    margin:25px; 
  }
 a {
    text-decoration:none; 
    color:black; 
    font-size:1.5em; 
 }
  .nombres{
width:20% ; 
margin:auto ; 
  }
  .ici{
    background-color:#1e1f4d; 
    color:white ; 
  }
 
  .nombres_{
    padding:5px; 
    border:1px solid black ; 
    margin:1px; 
  }

  .nombres_:hover{
    cursor:pointer; 
  }
  
</style>
<div class="display_flex nombres">
<?php 
for($i=0;$i<$total_page;$i++){


  if($i==$tab){
    ?>
    <div class="nombres_ ici">
    <a href="<?php echo $lien_page.$i ?>" style="color:white;">
    <?php echo $i ?></a>  
    </div>
    <?php 
  }
  else {
    
  }
  ?>
  <div class="nombres_">
  <a href="<?php echo $lien_page.$i ?>" >
  <?php echo $i ?>
</a>  
     </div>
  <?php 
}

?>
</div>

  
 


</body>
</html>
