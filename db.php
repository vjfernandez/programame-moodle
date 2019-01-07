<?php
    $servername = "localhost";
    $username = "programame";
    $password = "1234";
    $conn = new mysqli($servername, $username, $password, "programame");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    