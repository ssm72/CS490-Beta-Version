<?php

$JSON_Data = json_decode(file_get_contents("php://input"), true);

$question = $JSON_Data['question']; //Question inputed by professor
$answer = $JSON_Data['answer']; //difficulty of the question

//User input into an array
$question_info = array(
	'question' => $question,
	'answer' => $answer,
);

$questionInfo = json_encode($question_info);

$ch = curl_init(); //Initialize a cURL session

$url = "https://web.njit.edu/~rd278/CS490/Beta/takeExam.php";

curl_setopt($ch, CURLOPT_URL, $url); //URL link to the middleEnd's Php
curl_setopt($ch, CURLOPT_POST, 1); //Allow POST variables to be sent
curl_setopt($ch, CURLOPT_POSTFIELDS, $question_info); // Send Userinfo

$output = curl_exec($ch); //Execute

if($output === FALSE){ 
	echo "cURL Error: " . curl_error($ch); //if there is an error then print it out
}

curl_close($ch);

?>
