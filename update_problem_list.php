<?php
$base = dirname(__FILE__); // now $base contains "app"
include $base.'/db.php';

$myUriBase =  ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$url =str_replace("\\", "/", $myUriBase."jsonuser.php?id=");

$sql ="select id from usuarios";
$result = $conn -> query($sql);
while ($row = $result->fetch_assoc()) {
        $tUrl=$url . $row["id"];
        echo $tUrl."<br>";
        file_get_contents( $tUrl);
}


