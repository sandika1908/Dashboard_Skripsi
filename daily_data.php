<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current = $_POST["current"];
    $power = $_POST["power"];

    // Query untuk memasukkan data ke dalam tabel dht
    $sql = "INSERT INTO daily_monitoring (current, power) VALUES ('$current', '$power')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>


