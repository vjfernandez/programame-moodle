<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrenamiento Programa-me</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="programame.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</head>
<body class="container-fluid">
<table id ="tablaproblemas" class = "table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">nombre</th>
        </tr>
    </thead>
<?php
include './vendor/autoload.php';
require 'db.php';
$id_aer = 0;
if (isset($_REQUEST["aid"])) {
    $moodle_id = $_REQUEST["aid"];
    $sql = "SELECT id FROM usuarios WHERE id_moodle=$moodle_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_aer = $row["id"];
    }
}
$sql = "SELECT id, titulo FROM problemas ORDER BY date, id";
$result = $conn->query($sql);
if (!$result) {
    die($conn->error);
}
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
    <tr id ="r<?=$row["id"]?>">
        <th scope="row">
            <a href="https://www.aceptaelreto.com/problem/statement.php?id=<?=$row["id"]?>" target="_blank">
                <?=$row["id"]?>
            </a>
        </th>
        <td>
            <?=$row["titulo"]?>
        </td>
    </tr>
<?php
}
} else {
    echo "0 results";
}
$conn->close();
?>
</table>
<?php if ($id_aer>0) { ?>
<script>
    fetchProblems(<?=$id_aer?>);
</script>
<?php } ?>
</body>
</html>
