<?php 
if (isset($_GET['p']))
  $packageId = $_GET['p'];
//else if (isset($_POST['packageid']))
// $packageId = $_POST['packageid'];
//$ans['answer']=" no value";
if (isset($packageId)){
	if(strcasecmp($packageId,"Hello! How are you?")==0)
		$ans['answer'] = "Hello, Kitty! I am fine.";
	else if(strcasecmp($packageId,"Hi! What is your name?")==0)
		$ans['answer'] = "My name is Heruko.";
	else if(strcasecmp($packageId,"Good morning! I am Kitty! It's a pleasure to meet you!")==0)
		$ans['answer'] = "Good morning! Thank you,nice to meet you too.";
}

header('Content-type: application/json');
echo json_encode($ans);
?>
