<?php
$base = dirname(__FILE__); // now $base contains "app"

include $base.'/vendor/autoload.php';
include $base.'/db.php';

function insertar ($num, $titulo) {
    global $conn;
    $sql ="INSERT INTO problemas(id, titulo) values ($num, '$titulo')";
    echo $sql."<br>";
    $rows = $conn -> query($sql);
    echo $rows.'<br>';
}


$doc = hQuery::fromFile('https://www.aceptaelreto.com/');
$rm = $doc->find('div.readMore a' );
$href = $rm[0]["href"];
$texto = substr($href, 54);
$texto = substr($texto,0, strlen($texto)-11);
$sql = "SELECT count(*) as cuenta FROM problemas WHERE id = ".$texto;
$result = $conn -> query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cuenta = $row["cuenta"];
}
if ($cuenta == 0) {
    for ($i = $texto; $i < $texto + 5; $i += 1) {
        $doc = hQuery::fromFile('https://www.aceptaelreto.com/problem/statement.php?id='.$i);
        if ($doc) {
            $title = $doc->find('h1');
            $titulo = $title[1]->text;
            if ($i == $texto) {
                $titulo .= " [*".date("Y-m-d")."]";
            }

            insertar($i, $titulo);
        }     
    }
}

?>
