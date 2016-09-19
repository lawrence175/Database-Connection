<!DOCTYPE html>
<html>
<head>
<style type="text/css">
body { margin:100px 0 0 200px; }
input { width:300px; }
</style>
</head>
<body>
<div style="width:500px;">

<?php

error_reporting(E_ALL ^ E_DEPRECATED); //Report all errors except E_DEPRECATED

if( count($_POST) )
{
   $OK = false;
   if( $MySQL = @mysql_connect($_POST['hostname'],$_POST['username'],$_POST['password']) )
   {
      if( @mysql_select_db($_POST['DatabaseName']) )
      {
         echo '<h3>Connection Successful!</h3>';
         $OK = true;
      }
   }
   if( ! $OK )
   {
      echo '<p>Unable to connect.</p><p>' . mysql_error() . '</p>';
   }
   echo '<hr style="margin:35px;">';
}

?>

<form method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>">
<table align="center" border="0" cellpadding="0" cellspacing="6">
<tr>
<td>Host</td>
<td><input type="text" name="hostname" value="<?php echo(@$_POST['hostname']); ?>"></td>
</tr>
<tr>
<td>Database</td>
<td><input type="text" name="database" value="<?php echo(@$_POST['database']); ?>"></td>
</tr>
<tr>
<td>Username</td>
<td><input type="text" name="username" value="<?php echo(@$_POST['username']); ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="text" name="password" value="<?php echo(@$_POST['password']); ?>"></td>
</tr>
<tr>
<td> </td>
<td><input type="submit" name="submitter" value="Connect"></td>
</tr>
</table>
</form>

</div>
</body>
</html>

