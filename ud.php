<?php 
	session_start();
	if(!isset($_SESSION['username']) and !isset($_SESSION['email'])){
		header('location: loginform.php');
	}
?>

<!DOCTYPE html>
<html>
    <head>
       <title>User details</title>
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
        <table>
                <tr>
                    <td>Welcome </td><td><?php echo $_SESSION['name']; ?></td>
                </tr>
        </table>
    <br><br>
    <a href="logout.php"><center><button type="button" class="button">Logout</button><center></a>
</body>
</html>
