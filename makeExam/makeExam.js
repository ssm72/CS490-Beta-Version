function submitTotalPoints(){
	var score = document.getElementById('totalPoints').value;
	
  var json = {
		'score': score,
	}
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4){
		}
	}

	xhr.open('POST', 'totalExamScore.php', true);
  xhr.send(JSON.stringify(json));


	document.getElementById('examPoints').style.display = "none";

	document.getElementById('questionsDiv').style.display = "block";


//  xhr.open('GET', 'makeExam.php', true); 
 
  return score;
};


window.onload = function(){
  var xhr = new XMLHttpRequest();
  xhr.responseType = "text";
	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4){
      document.getElementById('allQuestions').innerHTML = xhr.responseText;
      console.log("Brrrrrr "+ xhr.responseText);
		}
	}
    
  //xhr.open('GET', 'https://web.njit.edu/~rd278/CS490/Beta/sendQuestion.php', true); 
  xhr.open('GET', 'makeExam.php', true); 

  xhr.send(null);
  
//      document.getElementById('allQuestions').value = xhr.responseText.question;
  
}