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

$narrow=stristr($result,'_m3b');
$narrow=stristr($narrow,'{');
$narrow=stristr($narrow,'_m3b');
//echo $narrow; 
//echo "<br>";
if($narrow!=false){
	$finalAns=stristr($narrow,"<",true);
	$finalAns=$temp=strrev($finalAns);
	$finalAns=stristr($finalAns,">",true);
	$finalAns=$temp=strrev($finalAns);
	$ans['answer'] = $finalAns;
}
if(stristr($query,"Which") !=false && stristr($query,"Neela")!=false && (stristr($query,"varsity")!=false|| stristr($query,"university")!=false))
		$ans['answer'] = "BUET";
if(stristr($query,"Which") !=false && stristr($query,"Neela")!=false && (stristr($query,"college")!=false|| stristr($query,"College")!=false))
		$ans['answer'] = "Holy...(you konw the meaning. right!)";
header('Content-type: application/json');
echo json_encode($ans);
//echo $finalAns;
?>
