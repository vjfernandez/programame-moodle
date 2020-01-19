<?php
include 'db.php';
$problems = [];
$sql = "select id from problemas";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    array_push($problems, intval($row["id"]));
}
$result->close();

$sql = "select * from usuarios order by tipo, nombre";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="programame.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="container-fluid">
    <div class="row h-100">
        <div class="col-sm-4 h-100">
            <ul class="list-group mt-2">
                <?php
                while ($row = $result->fetch_assoc()) :
                    $problemasResueltos = json_decode($row["problemas"]);
                    $intersect = array_intersect($problems, $problemasResueltos);
                    $cuenta = count($intersect);
                ?>
                    <li class="list-group-item" title="<?= implode(", ", $intersect) ?>">
                        <a href="listaproblemas.php?aid=<?= $row["id_moodle"] ?>" target="lista"><?= $row["nombre"] ?></a>
                        <span class="badge badge-<?= ($row["tipo"] == "a" ? "primary" : "secondary") ?>"><?= $cuenta ?></span>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
            <!--small>(Actualizado 1 vez al día)</small-->
        </div>
        <div class="col-sm-8 h-100">
            <iframe src="listaproblemas.php" style="width:100%;height:100%" name="lista" frameborder=0;></iframe>
        </div>
    </div>
</body>

</html>