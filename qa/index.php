<?php
//take the question provided in get method 
if (isset($_GET['q'])){
  $query = $_GET['q'];
  $query=rawurldecode($query);
  $query=rawurlencode($query);
}

$ans['answer']='Your majesty! Jon Snow knows nothing! So do I!';

$url='https://www.google.com/search?q='.$query;	
$result = file_get_contents($url);
$narrow=stristr($result,'"_m3b>"');
echo $narrow; 
echo "<br>";
if($narrow!=false){
	$finalAns=stristr($narrow,"<",true);
	$ans['answer'] = $finalAns;
}
header('Content-type: application/json');
echo json_encode($ans);
echo $finalAns;
?>
