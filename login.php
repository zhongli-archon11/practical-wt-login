<?php 
	session_start();
	if(isset($_SESSION['username']) and isset($_SESSION['email']))
	{
		header('location:udetails.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>INAZUMA Login</title>
    <style type="text/css">
    .error
		{
		 color: rgb(255, 0, 0);
     font-size: 15px;
		}

		fieldset
		{
			border-radius: 30px;
			border: 1px solid black;
      margin: center;
		}

	</style>
</head>
<body>
  <fieldset>
  <legend><h2>Log In</h2></legend>
    <form method="post" name="login">
    <table class="center">
      <tr>
      <td><label for="uname">Username: </label></td>
      <td><input type="text" size="30" style="font-size:15px;" placeholder="Enter your email" name="uname" id="username"></td>
      </tr>
      <tr>
        <td></td>
        <td><p id="errormsg1" class="error"></p></td>
      </tr>
      <tr>
      <td><label for="psw">Password: </label></td>
      <td><input type="password" size="30" style="font-size:15px;" placeholder="Enter Password" name="psw" id="password"></td>
      </tr>
      <tr>
          <td></td>
			    <td><p id="errormsg2" class="error"></p></td>
	 	  </tr>
       <tr>
          <td></td>
			    <td><p id="errormsg" class="error"></p></td>
	 	  </tr>
      <tr>
        <td></td>
        <td><button type="submit" name="submit" onclick="return validatef()" class="button">Log In</button>
        <button type="reset" class="button">Clear All</button></td>
      </tr>
    </table>
    </fieldset>
    </form>

    <script type="text/javascript">
		function validatef()
		{
			var uname= document.getElementById("username").value;
			var passwd= document.getElementById("password").value;
      var ret=true;
			
			if(uname.length==0)
			{
				document.getElementById("errormsg1").innerHTML="Username can not be empty";
				ret= false;
			}
			
			if(passwd.length==0)
			{
				document.getElementById("errormsg2").innerHTML="Password can not be empty";
				ret= false;
			}
			
			else if(uname.length==0 && passwd.length==0)
			{
				document.getElementById("errormsg").innerHTML="Username and Password can not be empty";
				ret= false;
			}
      return ret;
		}
    </script>
    <?php
            if(isset($_POST['submit'])) {
                $email = $_POST['uname'];  
                $sql = "SELECT * FROM `uinfo` WHERE `EMAIL`='$email'";

                $conn= mysqli_connect("localhost", "root","","practical");

                if($conn->connect_errno)
                {
                      die("Error connection database:" . $conn->connect_error);
                }
                else
                {
                $result = $conn->query($sql);
                if( $result->num_rows<1)
                  echo '<script>alert("Username not valid")</script>';
                else
                {
                    $row = $result->fetch_assoc();

                    if(strcmp($row['PSWD'], md5($_POST['psw']))!=0)
                    {
                      echo '<script>alert("Username or Password mismatch")</script>';
                    }
                    else
                    {
                        $_SESSION['name'] = $row['NAME'];
                        $_SESSION['email']= $email;
                        $_SESSION['gender'] = $row['GENDER'];
                        $_SESSION['password'] = $row['uPASSWORD'];


                        session_write_close();

                        header('location:ud.php');
                    }
                }
                }
            }
        ?>
</body>
</html>