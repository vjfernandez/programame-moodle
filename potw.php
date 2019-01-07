<!DOCTYPE html>
<?php
    require 'db.php';
    $sql = "select id, titulo from problemas where titulo like '%[*%' order by date desc limit 1";
    $result = $conn -> query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = $row["titulo"];
        $id = $row["id"];
    }
    $titulo = substr($titulo, 0, strpos($titulo, "[*")-1);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POTW</title>
    <style>
        body {
            font-family: "Verdana";
        }
    </style>
</head>
<body>
<div style="border:1px solid gray; border-radius:4px;padding:5px;box-shadow: 3px 6px #888888;">
    Problema de la semana de <strong>aceptaelreto.com</strong>:
    <h2><a href="https://www.aceptaelreto.com/problem/statement.php?id=<?=$id?>" target="_blank"><?=$id?></a> - <?=$titulo?></h2>
</div>
</body>
</html>