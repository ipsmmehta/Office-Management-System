function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
    
  function isNumeric (evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  
function checkEmail() {

    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
}

function checkname()
{
	var User_name ="";
	var name = document.getElementById('name');
	User_name = name.value;
	if(User_name=="")
		{
			alert("Please specify Name here  ");
			document.getElementById('name').style.backgroundColor = '#bfa';
			return false;
		}
		else
		{ }
}

function checkdesignation()
{
	var user_designation ="";
	var designation = document.getElementById('designation');
	user_designation = designation.value;
	if(user_designation=="")
		{
			alert("Please specify Designation here ! ");
			document.getElementById('designation').style.backgroundColor = '#bfa';
			return false;
		}
		else
		{ }
}

function validate_password()
      {
      
		var user_password ="";
		var userpassword = document.getElementById('password');
		user_password = userpassword.value;
		var password_confirmation ="";
		var userpassword_con = document.getElementById('password_confirmation');
		password_confirmation = userpassword_con.value;
		
		if(user_password=="")
		{
			alert("Please Enter your password here ! ");
			document.getElementById('password').style.backgroundColor = '#bfa';
			return false;
		}
	  
		 
        if(user_password.length > 4  && user_password.length<15)
			{
			//	 return( true );
			}
			else {
				alert(" password Must be between 5 To 15! ");
				document.getElementById('password').style.backgroundColor = '#bfa';
				return false;
			}
			
		if(password_confirmation.length > 4  && password_confirmation.length<15)
			{
			//	 return( true );
			}
			else {
				alert(" Confirm password Must be between 5 To 15!");
				document.getElementById('password_confirmation').style.backgroundColor = '#bfa';
				return false;
			}
 
		  if(user_password == password_confirmation)
		  {
			  return( true );
		  }else{
				alert(" Password & Confirm password Must be same! ");
				document.getElementById('password').style.backgroundColor = '#bfa';
				document.getElementById('password_confirmation').style.backgroundColor = '#bfa';
				return false;
		  }  
}
	  
function validate_single_passwd()
{
		var user_password ="";
		var userpassword = document.getElementById('password');
		user_password = userpassword.value;
		 if(user_password.length > 4  && user_password.length<19)
			{
				//	 return( true );
			}
			else {
				alert(" Must specify the password here ");
				document.getElementById('password').style.backgroundColor = '#bfa';
				return false;
			}
}

function validate_Registerdata()
		{
		checkname();
		checkEmail();
		checkdesignation();
		validate_password();
 
}

function validate_Login()
		{
		checkEmail();
		validate_single_passwd();
}

function validate_Resetdata()
{
	checkEmail();
}
