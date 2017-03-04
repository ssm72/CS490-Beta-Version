<?php
$questionInfo = $_POST['examScore'];
$JSON_Data = json_decode(file_get_contents("php://input"), true);

$id = $JSON_Data['id'];
$question = $JSON_Data['Question']; //Total Exam Score inputed by professor

//$question = $_POST['question']; //Total Exam Score inputed by professor
//$diff = $_POST['diff'];

$diff = $JSON_Data['diff'];
$TC1 = $JSON_Data['TC1'];
$TC2 = $JSON_Data['TC2'];
$TC3 = $JSON_Data['TC3'];
//echo "HELLO" . $question . " Okay " . $id . " something New " . $diff . " TC1 " . $TC1 . " TC2 " . $TC2 . " TC3 " . $TC3 ;

//echo $question . " QuestionID: " . $id . "<br>";

echo "<table border = 1>";
  echo "<tr>";
    echo "<td> <input type='checkbox' id = $id></input> </td>";
//    echo "<td>" . $id . "</td>";
    echo "<td>" . $question . "</td>";
    echo "<td>" . $diff . "</td>";
//    echo "<td>" . $TC1 . "</td>";
//    echo "<td>" . $TC2 . "</td>";
  echo "</tr>";
echo "</table>";  


//echo $question . " QuestionID: " . $id . "<br>";

//echo $questionInfo;
//$JSON_Data = json_decode(file_get_contents('https://web.njit.edu/~rd278/CS490/Beta/sendQuestion.php'));
//$question=$JSON_Data['question'];
//$diff=$JSON_Data['diff'];
//
//echo $question;

?>