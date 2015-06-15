<?php
//take the question provided in get method 
if (isset($_GET['q'])){
  $query = $_GET['q'];
  $query=rawurldecode($query);
  echo $query;  
}

$url='https://www.google.com.bd/';//search?q='.$query;	
$result = file_get_contents($url);
echo $result;
?>
