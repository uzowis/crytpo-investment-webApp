<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)){
	 $fname = $row['fname'];
	$user = $row['user']; 
	$id =$row['id'];
  }
  
    
  }else  {
	  
	  echo "Failed" ;
  }

  
  
//mysqli_close($db);


?>