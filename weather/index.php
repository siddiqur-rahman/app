<?php 
if (isset($_GET['q'])){
  $query = $_GET['q'];
  $query=rawurldecode($query);
}	
if (isset($query)){
	// finding the name of the CITY
	$query=stristr($query,"?",true);
	$temp=strrev($query);
	$temp2=explode(" ",$temp);
	$city=strrev($temp2[0]);
	
	// getting the json formate output from openweathermap api
	$url='http://api.openweathermap.org/data/2.5/weather?q='.$city;	
	$json = file_get_contents($url);
	$array = json_decode($json, true);
	
	$ans['answer']="";
	// temperature output
	if(stristr($query,"temperature")!=false){
		$ans['answer'] = $array['main']['temp']. " K";
	}
	// humidity
	else if(stristr($query,"humidity")!=false){
		$ans['answer'] = $array['main']['humidity']."";
	}
	else if(stristr($query,"weather")!=false){
		// parsing query to find Rain/cloud / clean
		$a=stristr($query,"there");
		$a2=explode(" ",$a);
		$con=$a2[1];
		$res='No';
		$st="";
		$st.=$array['weather'][0]['main'];
		if(strcasecmp($con,$st)==0) {
			$res='Yes';
		}
		$ans['answer'] = $res;
	}
}
// json output
header('Content-type: application/json');
echo json_encode($ans);
?>
