<?php
include("auth.php");

session_start();
 if (auth($_POST["login"], $_POST["passwd"]))
  {
	 	$_SESSION["loggued_on_user"] = $_POST["login"];
		echo("<!DOCTYPE html>\n<html>\n<head>\n<title>logged_in</title></head>\n<body>\n");
		echo("<iframe src='chat.php' height=80 width=100%></iframe>\n");
		echo("<iframe src='speak.php' height=100% width=100%></iframe>\n");
		echo("</body></html>\n");
 	}
else
{
	echo("ERROR\n");
	$_SESSION["loggued_on_user"] = "";
}
?>
