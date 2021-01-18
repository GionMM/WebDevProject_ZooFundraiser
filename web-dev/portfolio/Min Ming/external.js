function allowDrop(ev){
  ev.preventDefault();
}

function drag(ev){
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev){
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}

function sendEmail(){
	var answer = window.prompt("Enter your email:","example@mail.com");
	if(answer==""){
	window.alert("Please enter your email here.");
	sendEmail();
	}
	else if(answer){
	var ok = confirm("Are you sure your email is correct?");
	if(ok){
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(answer.match(mailformat)){
		window.alert("Thank you for your submission!");
		return (true);
	}
	else{
		window.alert("Invalid email address! Please enter a valid email address");
		//return (false);
		sendEmail();
	}
	}
	else{
	sendEmail();
	}
	}
	}

function Site(val){
	window.location.href = val;
}