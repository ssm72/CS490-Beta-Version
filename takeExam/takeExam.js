var num = 1;

function lastQuestion(){
	if(num >= 3){
		document.getElementById('next').style.display = "none";
		document.getElementById('submit').style.display = "block";
  }

  var question = document.getElementById('questionForTakeExam');
	var question = question.textContent || question.innerText;
	var answer = document.getElementById('answerFromStudent').value;
 
	answer = answer + "}";

  var json = {
  	'question': question,
  	'answer': answer,
  }
 
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4){
		}
	};
  xhr.open("POST", "takeExam.php", true);
  xhr.send(JSON.stringify(json));
  
  document.getElementById('answerFromStudent').value="";

	num++;

}

function sendData(){

	var question = document.getElementById('questionForTakeExam');
	var question = question.textContent || question.innerText;
	var answer = document.getElementById('answerFromStudent').value;
 
	answer = answer + "}";
	console.log(question + "\n"+ answer);

  var json = {
  	'question': question,
  	'answer': answer,
  }
 
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4){
		}
	};
  xhr.open("POST", "takeExam.php", true);
  xhr.send(JSON.stringify(json));
  
  document.getElementById('answerFromStudent').value="";
}
