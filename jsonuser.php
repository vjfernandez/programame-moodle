<?php
header("Content-Type: application/json");
$userid = $_REQUEST["id"];
if (!isset($userid)) {
    die("no userid");
}
include './vendor/autoload.php';
$doc = hQuery::fromFile('https://www.aceptaelreto.com/user/profile.php?id='.$userid);
if (!$doc) {
    die ("No doc found");
}
$trs = $doc->find('tr');
$titles = [];
if ($trs) {
    foreach ($trs as $tr) {
        if (!$tr->hasClass("danger")) {
            $texto = trim($tr->text());
            $numero = substr($texto, 0, strpos($texto," "));
            array_push($titles, intval($numero));
        }
    }
}
$json = json_encode($titles);
echo $json;
//----db
include 'db.php';
$sql ="update usuarios set problemas = '$json' where id = $userid";
$rows = $conn -> query($sql);
