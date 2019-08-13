<?php

    $searchCourse = $_GET["searchCourse"];
    $link = mysqli_connect("127.0.0.1", "root", "secret", "IPAssignment");
    $query = mysqli_querry($link, "SELECT * FROM courses WHERE category LIKE '%$searchCourse%'");
    while ($row = mysqli_fetch_array($query)) {
        echo $row["courseTitle"];
    }
?>