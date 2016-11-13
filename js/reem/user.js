function CheckLoginSession(){
	ObjLoginUser = JSON.parse(sessionStorage.getItem('obj_user'));
    if (ObjLoginUser == null) {
        location.href = "login.html";
    } else {
		return true;
	}
}

function Logout() {
    sessionStorage.removeItem('obj_user');
    location.href = "login.html";
}

function UserAdd() {
if(CheckValidation() == true){
    //document.getElementById("Waiting").style.display = "block";
	var Name = document.getElementById("Name");
	var Email = document.getElementById("Email");
	/*
	$.ajax({
			
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/checkEmail",
			data :  {
				"email":"'"+Email.value+"'"				
			},
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){  
				if(resp == false){
	*/
				document.getElementById("err_Email").innerHTML="";
				var Website = document.getElementById("Website");
				var Phone = document.getElementById("Phone");
				var Location = document.getElementById("Location");
				var Username = document.getElementById("Username");
				var Password = document.getElementById("Password");
				$.ajax({
						
						type: "POST",
						url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/signup",
						data :  {
							"email":"'"+Email.value+"'",
							"pass":"'"+Password.value+"'",
							"uname":"'"+Username.value+"'",
							"nickname":"'"+Name.value+"'",
							"website":"'"+Website.value+"'",
							"phone":"'"+Phone.value+"'",
							"location":"'"+Location.value+"'"
						},
						contentHeader: "application/x-www-form-urlencoded",
						success: function(resp){  
							//alert("Server said:\n '" + resp + "'");
							console.log(resp);
							var responseObj =JSON.parse(resp);
							if(responseObj.state == "false"){
								document.getElementById("Success").innerHTML= "<p class='err'>Fail Registration</p>";								
							}else{
								document.getElementById("Success").innerHTML= "Registration is success";
							}
						},  
						error: function (xhr, ajaxOptions, thrownError) {
								alert(xhr.responseText);
								alert(thrownError);
							  },cache: false
				});
			/*
				}else{
					 document.getElementById("err_Email").innerHTML="This email exist before";
				}
				
				
			},  
		    error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
	*/
}
}

function UserLogin(){
	if(CheckLogin()){
		var EmailLogin = document.getElementById("EmailLogin");
		var PasswordLogin = document.getElementById("PasswordLogin");
		alert(EmailLogin.value+' ...  '+ PasswordLogin.value);
		$.ajax({
				type: "POST",
				url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/login",
				data :  {
					"email":"'"+EmailLogin.value+"'",
					"pass":"'"+PasswordLogin.value+"'"
				},
				contentHeader: "application/x-www-form-urlencoded",
				success: function(resp){  
					//alert("Server said:\n '" + resp + "'");
					//console.log(resp);
					
					var UserObj = new Object();
					UserObj.user_id = 2;
					UserObj.user_name = 'reemshwky';
					UserObj.password = '123';
					UserObj.nicename = 'reem shwky';
					UserObj.location = 'location';
					UserObj.email  = 'eng.reem.shwky';
					UserObj.url    = 'http://www.google.com';
					UserObj.phone  = '00 000 0000';
					
					var localData_user = JSON.stringify(UserObj);
					sessionStorage.setItem('obj_user', localData_user);
					window.location.href ="index.html";
				},  
				error: function (xhr, ajaxOptions, thrownError) {
						alert(xhr.responseText + ' '+ thrownError);
				},cache: false
		});
	}
	
}
function CheckLogin(){
	var c2, c4 = true;
	var EmailLogin = document.getElementById("EmailLogin");		     var err_EmailLogin = document.getElementById("err_EmailLogin");
	var PasswordLogin = document.getElementById("PasswordLogin");	 var err_PasswordLogin = document.getElementById("err_PasswordLogin");
	
	//var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(EmailLogin.value == "") {err_EmailLogin.innerHTML = "Email is empty";	 	 		c2 = false;}
    //else if(!re.test(Email.value)){err_Email.innerHTML = "Email is not valid";	c2 = false;}
	else{err_EmailLogin.innerHTML = ""; c2 = true;}
	
	if(PasswordLogin.value == ""){err_PasswordLogin.innerHTML = "Password is empty";      c4 = false;}
	else{err_PasswordLogin.innerHTML = ""; c4 = true;}
	
	if(c2 == true && c4 == true){
		return true;
	}else{
		return false;
	}
}
function CheckValidation(){
	
	var c1,c2,c3,c4,c5 = true;
	var Name = document.getElementById("Name");			 var err_Name = document.getElementById("err_Name"); 
	var Email = document.getElementById("Email");		 var err_Email = document.getElementById("err_Email");
	var Website = document.getElementById("Website");	 var err_Website = document.getElementById("err_Website");
	var Phone = document.getElementById("Phone");		 var err_Phone = document.getElementById("err_Phone");
	var Location = document.getElementById("Location");	 var err_Location = document.getElementById("err_Location");
	var Username = document.getElementById("Username");	 var err_Username = document.getElementById("err_Username");
	var Password = document.getElementById("Password");	 var err_Password = document.getElementById("err_Password");
	var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; // /^(([^<>()[]\\.,;:\s@\"]+(\.[^<>()[]\\.,;:\s@\"]+)*)|(\".+\"))@(([[0-9]{1,3}\‌​.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
	if(Website.value != ""){
		var pattern = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
		if(!pattern.test(Website.value)) {   err_Website.innerHTML ="Please enter a valid URL."; c5 = false;} 
		else { err_Website.innerHTML =""; c5 = true; }
	}
  
	//alert(Email.value+ " ... "+ re.test(Email.value));
	
	if(Name.value == "") {err_Name.innerHTML="Name is empty";	 	     		c1 = false;}
	else{err_Name.innerHTML = ""; c1 = true;}
	
	if(Email.value == "") {err_Email.innerHTML = "Email is empty";	 	 		c2 = false;}
    else if(!re.test(Email.value)){err_Email.innerHTML = "Email is not valid";	c2 = false;}
	else{err_Email.innerHTML = ""; c2 = true;}
	
	if(Username.value == ""){err_Username.innerHTML = "Username is empty";      c3 = false;}
	else{err_Username.innerHTML = ""; c3 = true;}	
	
	if(Password.value == ""){err_Password.innerHTML = "Password is empty";      c4 = false;}
	else{err_Password.innerHTML = ""; c4 = true;}
	if(c1 == true && c2 == true && c3 == true && c4 == true && c5 == true){
		return true;
	}else{
		return false;
	}
}

function Profile(){
	var ObjLoginUser = JSON.parse(sessionStorage.getItem('obj_user'));
	document.getElementById("Name").value=ObjLoginUser.nicename;
	document.getElementById("Email").value=ObjLoginUser.email;
	document.getElementById("Website").value=ObjLoginUser.website;
	document.getElementById("Phone").value=ObjLoginUser.phone;
	document.getElementById("Location").value=ObjLoginUser.location;
	document.getElementById("Username").value=ObjLoginUser.user_name;
}