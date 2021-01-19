function verifyEmail(){
    var emailFlag= false;
    var emailRe=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    email=String(document.getElementById("email").value).toLowerCase();
    emailFlag=emailRe.test(email)

    return emailFlag;
}

/* function verifyDate(){
    var dateFlag=false;
    var dateRe = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/;
    
    date=String(document.getElementById("bdate").value);
    dateFlag=dateRe.test(date);

} */

function entryValidation(){
    
    var errorMessage="";
    var submissionFlag=verifyEmail()/* &&verifyDate() */;

    if(!verifyEmail()){
        errorMessage+="Not a valid email address! Please enter a correct email address \n";
        document.getElementById('email').style.borderColor="red";
    }

   /*  if(!verifyDate()){
        errorMessage+="Not a valid birth date! Please enter a correct email address \n";
        document.getElementById('bdate').style.borderColor="red";
    } */

    /*If all flags are true, then show thank you alert. Else, show alert prompt*/
    if (submissionFlag){
        window.alert('Thank you for your submission!');
    }
    else
    {
        window.alert(errorMessage);
    }

    return submissionFlag;
}