<?php 
if (isset($_GET['q'])){
  $packageId = $_GET['q'];
  $packageId=rawurldecode($packageId);
  //echo $packageId;  
}
if (isset($packageId)){
	if(strcasecmp($packageId,"Hello! How are you?")==0 || (stristr($packageId,"How") ==0&& stristr($packageId,"you")==0))
		$ans['answer'] = "Hello, Kitty! I am fine.";
	else if(strcasecmp($packageId,"Hi! What is your name?")==0 || (stristr($packageId,"What") ==0&& stristr($packageId,"name")==0))
		$ans['answer'] = "My name is Siddiqur Rahman.";
	else if(strcasecmp($packageId,"Good morning! I am Kitty! It's a pleasure to meet you!")==0 || (stristr($packageId,"meet") ==0&& stristr($packageId,"pleasure")==0))
		$ans['answer'] = "Good morning! Thank you,nice to meet you too.";
}

header('Content-type: application/json');
echo json_encode($ans);
?>
