<!DOCTYPE html>
<html>
<head>
<title>3task</title>
<style type="text/css">

.center {
		text-align: center;
		background-color: #F2EFBD;
		padding: 50px;
		font-size: 2vw;
		border-radius: 5px;
}
</style>

<meta charset="utf-8" />
</head>

<body>
<?php
session_start();
$constl = "user";
$constp = "qwerty";
if(isset($_GET["login"]) && $_GET["login"] == $constl && $_GET["pass"] == $constp)
{
		$_SESSION["login"] = $_GET["login"];
		$_SESSION["pass"] = $_GET["pass"];
		?>
    <a href="./remote_text.php">http://kappa.cs.petrsu.ru/~kulakov/courses/php/fortune.php</a>
		<?php
}
?>

<form class="center" method="get" enctype="multipart/form-data">
	&#160&#160Логин:&#160<input type="text" name="login" /><br />
	Пароль:&#160<input type="text" name="pass" /><br />
	<input type="submit" value="Вход" />
</form>

</body>
</html>

