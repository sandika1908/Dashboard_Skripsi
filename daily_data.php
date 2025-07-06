<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current = $_POST["current"];
    $power = $_POST["power"];
    $id_rack = 9; // Menetapkan id_rack secara langsung

    // Query untuk memasukkan data ke dalam tabel daily_monitoring
    $sql = "INSERT INTO daily_monitoring (current, power, id_rack) VALUES ('$current', '$power', '$id_rack')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>


