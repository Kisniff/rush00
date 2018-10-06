<?php
function quit($message)
{
	echo($message);
	exit ;
}
if (!($_POST["login"] && $_POST["passwd"] && $_POST["submit"] == "OK"))
	quit("ERROR\n");
$filepath = "./private/passwd";
if (!($file = unserialize(file_get_contents($filepath, FILE_USE_INCLUDE_PATH))))
	mkdir("./private/", 0777);
$i = -1;
while ($file[++$i])
	if ($file[$i]["login"] == $_POST["login"])
		quit("ERROR\n");
$file[$i]["login"] = $_POST["login"];
$mdp = hash("whirlpool", $_POST["passwd"]);
$file[$i]["passwd"] = $mdp;
$status = file_put_contents($filepath, serialize($file));
echo("OK\n");
?>
