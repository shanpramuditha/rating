<?php

$name = $_POST['name'];
$value = $_POST['rating'];

require 'mysql.php';

$sql = sprintf("INSERT INTO rating (username, rating)VALUES ('%s', %f)",$name,$value);

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

