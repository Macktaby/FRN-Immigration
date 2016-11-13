<?php session_start();
require_once("includes/class/config.php");
require_once("includes/class/user.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Control Panel </title>
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		  <?
			  if(($_POST['User']) and ($_POST['Login'] == "LoginUser") ){
				  $Obj = new User();
				  $user_name = strip_tags($_POST['username']);
				  $password = strip_tags($_POST['password']);
				  $row = $Obj->login($user_name,$password);				  
				  if(isset($row['user_name'])){
					   $_SESSION['user_name'] =$row['user_name'];
					   $_SESSION['nicename']  = $row['nicename'];
					   echo '<script type="text/javascript" >';
					   echo 'window.location = "product-view.php";';
					   echo '</script> ';			
				  }else{
					   $row = $Obj->CheckUsername($user_name);
					   if(isset($row['user_name'])){
						   echo 'Password  is not valid';
					   }
					   else{
							echo 'Username and Password not valid';
					   }
				  }
				  }
				?>

            <form  method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="please enter username" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="please enter password" />
              </div>
              <div>
				<input type="submit" name="User" value="Login" class="btn btn-default submit"/>
				<input type="hidden" name="Login" value="LoginUser" />
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
			  <br/>
			  <br/>
              <div class="separator"><br /></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
