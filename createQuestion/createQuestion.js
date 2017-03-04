sendData = function(){

	var question = document.getElementById('questionArea').value;
	var testCase1 = document.getElementById('testCase1Area').value;
	var testCase2 = document.getElementById('testCase2Area').value;
	var testCase3 = document.getElementById('testCase3Area').value;
	var diff = document.getElementById('selectDifficulty').value;

  var json = {
  	'question': question,
  	'testCase1': testCase1,
  	'testCase2': testCase2,
  	'testCase3': testCase3,
  	'diff': diff,
  }

	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4){
		}
	};
  xhr.open("POST", "createQuestion.php", true);
  xhr.send(JSON.stringify(json));
  document.getElementById("loginForm").reset();

};
