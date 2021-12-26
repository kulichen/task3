<html>
<body>

<?php
if (!isset($_COOKIE['count'])) {
	echo "Добро пожаловать!";
	$cookie = 1;
	setcookie("count", $cookie, time() + (86400 * 30), "/");
} else {
	$cookie = ++$_COOKIE['count'];
	setcookie("count", $cookie);
	echo "Вы посетили эту страницу ".$_COOKIE['count']." раз";
}
?>

</body>
</html>