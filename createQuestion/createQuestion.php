<?php

$JSON_Data = json_decode(file_get_contents("php://input"), true);

/*
$question = $_POST['question']; //Question inputed by professor
$diff = $_POST['diff']; //difficulty of the question
$testCase1 = $_POST['testCase1']; //1st Test Case of the question
$testCase2 = $_POST['testCase2']; //2nd Test Case of the question
$testCase3 = $_POST['testCase3']; //3rd Test Case of the question
*/

$question = $JSON_Data['question']; //Question inputed by professor
$diff = $JSON_Data['diff']; //difficulty of the question
$testCase1 = $JSON_Data['testCase1']; //1st Test Case of the question
$testCase2 = $JSON_Data['testCase2']; //2nd Test Case of the question
$testCase3 = $JSON_Data['testCase3']; //3rd Test Case of the question

//User input into an array
$question_info = array(
	'question' => $question,
	'diff' => $diff,
	'testCase1' => $testCase1,
	'testCase2' => $testCase2,
	'testCase3' => $testCase3,
);


$questionInfo = json_encode($question_info);

$ch = curl_init(); //Initialize a cURL session


//$url = "https://web.njit.edu/~pp385/addquestion.php";

$url = "https://web.njit.edu/~rd278/CS490/Beta/createQuestion.php";
//$url = "https://web.njit.edu/~ssm72/CS490/middle.php";

curl_setopt($ch, CURLOPT_URL, $url); //URL link to the middleEnd's Php
curl_setopt($ch, CURLOPT_POST, 1); //Allow POST variables to be sent
curl_setopt($ch, CURLOPT_POSTFIELDS, $questionInfo); // Send Userinfo
/*curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($questionInfo))
);*/

$output = curl_exec($ch); //Execute

if($output === FALSE){ 
	echo "cURL Error: " . curl_error($ch); //if there is an error then print it out
}

curl_close($ch);

?>
