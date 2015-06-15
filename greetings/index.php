<?php
//take the question provided in get method 
if (isset($_GET['q'])){
  $query = $_GET['q'];
  $query=rawurldecode($query);
  //echo $query;  
}

if (isset($query)){
	//first question 
	if(strcasecmp($query,"Hello! How are you?")==0 || (stristr($query,"How") !=false && stristr($query,"you")!=false))
		$ans['answer'] = "Hello, Kitty! I am fine.";
	//second question
	else if(strcasecmp($query,"Hi! What is your name?")==0 || (stristr($query,"What") !=false&& stristr($query,"name")!=false))
		$ans['answer'] = "My name is Siddiqur Rahman.";
	//third question
	else if(strcasecmp($query,"Good morning! I am Kitty! It's a pleasure to meet you!")==0 || (stristr($query,"meet") !=false&& stristr($query,"pleasure")!=false))
		$ans['answer'] = "Good morning! Thank you,nice to meet you too.";
}
// json output 
header('Content-type: application/json');
echo json_encode($ans);
?>
