<?php
//take the question provided in get method 
if (isset($_GET['q'])){
  $query = $_GET['q'];
  $query=rawurldecode($query);
  $query=rawurlencode($query);
}

$url='https://www.google.com.bd/search?q='.$query;	
$result = file_get_contents($url);
echo $result;
echo $query; echo "<br> <br>" ;
?>
