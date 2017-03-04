<?php
$JSON_Data = json_decode(file_get_contents("php://input"), true);

$score = $JSON_Data['score']; //Total Exam Score inputed by professor

$exam_score = array(
	'score' => $score,
);

$examScore = json_encode($exam_score);

$ch = curl_init(); //Initialize a cURL session


//$url = "https://web.njit.edu/~pp385/examPoints.php";

$url = "https://web.njit.edu/~rd278/CS490/Beta/examScore.php";

curl_setopt($ch, CURLOPT_URL, $url); //URL link to the middleEnd's Php
curl_setopt($ch, CURLOPT_POST, 1); //Allow POST variables to be sent
curl_setopt($ch, CURLOPT_POSTFIELDS, $examScore); // Send exam Score
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
