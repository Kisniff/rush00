<?php
function auth($login, $passwd)
{
	$filepath = "./private/passwd";
	if (!($file = unserialize(file_get_contents($filepath))))
	{
		echo("ERROR\n");
		exit;
	}
	$i = -1;
	$passwd = hash("whirlpool", $passwd);
	while ($file[++$i])
		if ($login == $file[$i]["login"])
			if ($passwd == $file[$i]["passwd"])
				return (TRUE);
	return (FALSE);
}
?>
