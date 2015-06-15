<?php 
if (isset($_GET['p']))
  $packageId = $_GET['p'];
	
if (isset($packageId)){
	$packageId=stristr($packageId,"?",true);
	$temp=strrev($packageId);
	$temp2=explode(" ",$temp);
	$loc=strrev($temp2[0]);
	
	$url='http://api.openweathermap.org/data/2.5/weather?q='.$loc;	
	$json = file_get_contents($url);
	$array = json_decode($json, true);
	
	$ans['answer']="";
	if(stristr($packageId,"temperature")!=false){
		$ans['answer'] = $array['main']['temp']. " K";
	}
	else if(stristr($packageId,"humidity")!=false){
		$ans['answer'] = $array['main']['humidity']."";
	}
	else if(stristr($packageId,"weather")!=false){
		$a=stristr($packageId,"there");
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

header('Content-type: application/json');
echo json_encode($ans);
?>
