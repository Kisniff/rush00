<?php
function quit($message)
{
	echo($message);
	exit ;
}

$filepath = "./private/passwd";
if (!($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && $_POST["submit"] == "OK" ) || !($file = unserialize(file_get_contents($filepath))))
{
	quit("ERROR\n");
}
$i = -1;
$is_ok = 0;
$login = $_POST["login"];
$old_mdp = hash("whirlpool", $_POST["oldpw"]);
while ($file[++$i])
{
	if ($login == $file[$i]["login"])
	{
		if ($old_mdp == $file[$i]["passwd"])
		{
			$file[$i]["passwd"] = hash("whirlpool", $_POST["newpw"]);
			echo("OK\n");
			$is_ok = 1;
		}
	}
}
if (!$is_ok)
	quit("ERROR\n");
$status = file_put_contents($filepath, serialize($file));
?>
