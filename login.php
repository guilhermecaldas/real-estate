<html>
    <?php
    include './head.php';   
    ?>
    <?php
session_start();
include "model/connection.class.php";

$login = $admin_login;
$password = $admin_password;
if (isset($_SESSION['admin'])) { $print_form = "already_login"; }

if ($print_form != "already_login")
{
   if (!@$_POST)
{
      $print_form = 1;
}

   else

{
    $posted_admin_login = $_POST['login'];
	$posted_admin_password =  $_POST['password'];
	
	
	if ($posted_admin_login == $login && $posted_admin_password == $password)	
	{	 
		 $_SESSION['admin'] =  $posted_admin_login;    	          
		 $print_form = 0;
        }
        else
        {
	    $msg = "You entered an incorrect username or password.<br>Hands will be amputated!";
		 $print_form = 1;
        }
}
}
   if ($print_form != 1 or $print_form == "already_login")
   {  
  header("Location: main_screen.php");  
   }
   else
   {
	?>		
<center>
   <div class="container">       
   <span class="label label-important"><?=@$msg?></span>   
   <form action="<?=$_SERVER["PHP_SELF"] ?>" method="POST" name="admin_login">     
   <h2 class="form-signin-heading">Log in to the administrator</h2> 
	<input type="text" name="login" value=""><br/>
	<input type="password"  name="password" value=""><br/>	
	<button class="btn btn-large btn-primary" type="submit">Log in</button>			
   </form>
   </div>
   </center>
   <?php 
   }   
?>
    <?php
    include './foot.php';
    ?>
</html>
