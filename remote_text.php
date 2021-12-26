<html>
<body>
<style type="text/css">

.center {
		text-align: center;
		background-color: #F2EFBD;
		padding: 50px;
		font-size: 2vw;
		border-radius: 5px;
text-overflow: ellipsis;

}
</style>

	<div class="center">

<?php
session_start();
if(!empty($_SESSION["login"]) && !empty($_SESSION["pass"]))
{
	$_SESSION["login"] = "";
	$_SESSION["pass"] = "";
	$content = file_get_contents("http://kappa.cs.petrsu.ru/~kulakov/courses/php/fortune.php");
	$minus = array("<?php", "?>");
	echo str_replace($minus, "", $content);
}
?>

	</div>
</body>
</html>

