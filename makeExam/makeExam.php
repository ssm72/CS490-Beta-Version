<?php
  //Connect to my database
  $link = mysql_connect('sql2.njit.edu', 'pp385', 'm1VF84Get');
  if (!$link) {
      die('Could not connect: ' . mysql_error());
  }
  
//  Select members table
  $db_selected = mysql_select_db('pp385', $link);
  if (!$db_selected) {
      die ('Can\'t use pp385 : ' . mysql_error());
  }
  
  $sth = mysql_query("SELECT * FROM Questions");
  $rows = array();
  while($r = mysql_fetch_assoc($sth)) {
      $rows[] = $r;
      $id = $r['ID'];
      $Question = $r['Question'];
      $diff = $r['Difficulty'];
      $TC1 = $r['TC1'];
      $TC2 = $r['TC2'];
      $TC3 = $r['TC3'];
      
      
      
      $question_info = array(
      	'id' => $id,
      	'Question' => $Question,
      	'diff' => $diff,
      	'TC1' => $TC1,
      	'TC2' => $TC2,
      	'TC3' => $TC3,
      );
        
        
      $questionInfo = json_encode($question_info);
        
        //print json_encode($rows);
        
        $ch = curl_init(); //Initialize a cURL session
      
        $url = "https://web.njit.edu/~ssm72/CS490/Beta/makeExam/temp.php";
        
        curl_setopt($ch, CURLOPT_URL, $url); //URL link to the middleEnd's Php
        curl_setopt($ch, CURLOPT_POST, 1); //Allow POST variables to be sent
        curl_setopt($ch, CURLOPT_POSTFIELDS, $questionInfo); // Send exam Score
        
        
        $output = curl_exec($ch); //Execute
        
        if($output === FALSE){ 
        	echo "cURL Error: " . curl_error($ch); //if there is an error then print it out
        }      
            
                              
  }
  
  //echo "HEllo" . $Question . "\n" . $id . "\n" . $diff . "\n" . $TC1 . "\n" . $TC2 . "\n" . $TC3;
  //echo $rows[];
  //$questionInfo = json_encode($rows);
  
//  $exam_score = array(
//	'id' => $id,
//	'Question' => $Question,
//	'diff' => $diff,
//	'TC1' => $TC1,
//	'TC2' => $TC2,
//	'TC3' => $TC3,
//);
//  
//  
//$examScore = json_encode($exam_score);
//  
//  //print json_encode($rows);
//  
//  $ch = curl_init(); //Initialize a cURL session
//
//  $url = "https://web.njit.edu/~ssm72/CS490/Beta/makeExam/temp.php";
//  
//  curl_setopt($ch, CURLOPT_URL, $url); //URL link to the middleEnd's Php
//  curl_setopt($ch, CURLOPT_POST, 1); //Allow POST variables to be sent
//  curl_setopt($ch, CURLOPT_POSTFIELDS, $examScore); // Send exam Score
//  
//  
//  $output = curl_exec($ch); //Execute
//  
//  if($output === FALSE){ 
//  	echo "cURL Error: " . curl_error($ch); //if there is an error then print it out
//  }
  
  curl_close($ch);
  
  mysql_close($link);

?>