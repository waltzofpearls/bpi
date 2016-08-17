<?php

session_start();

$name = $_SESSION['name'];

if (!isset($_POST['description'])) {
    header("Location: form.php?name=$name");
}

$config = parse_ini_file("db.ini", true);

$host = $config['database']['host'];
$user = $config['database']['user'];
$pass = $config['database']['pass'];
$dbname = $config['database']['dbname'];

$link = mysql_connect($host, $user, $pass);
mysql_select_db($dbname, $link);
mysql_set_charset('utf8', $link);

$description = mysql_real_escape_string($_POST['description']);
$sqlstring = "UPDATE companies SET description = '$description' WHERE name = '$name'";
$result = mysql_query($sqlstring);
header("Location: form.php?name=$name");
