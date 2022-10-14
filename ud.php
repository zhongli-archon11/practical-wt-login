<?php 
	session_start();
	if(!isset($_SESSION['username']) and !isset($_SESSION['email'])){
		header('location: loginform.php');
	}
?>

<!DOCTYPE html>
<html>
    <head>
       <title>INAZUMA User details</title>
   <style>

    fieldset
	{
		border-radius: 30px;
		border: 1px solid black;
        margin: center;
	}

    table
    {
        font-family: arial,sans-serif;
        margin-left: auto; 
		margin-right: auto;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    </style>
    </head>
<body>
<fieldset>
        <legend><h2>User Info</h2></legend>
        <table>
                <tr>
                    <td>NAME:</td><td><?php echo $_SESSION['name']; ?></td>
                </tr>
                <tr>
                    <td>EMAIL:</td><td><?php echo $_SESSION['email']; ?></td>
                </tr>
                <tr>
                    <td>PASSWORD:</td><td><?php echo "************"; ?></td>
                </tr>
        </table>
    </fieldset>
    <br><br>
    <a href="logout.php"><center><button type="button" class="button">Logout</button><center></a>
</body>
</html>
