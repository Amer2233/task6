<?php
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    echo "Connection Error" . mysqli_connect_error($conn);
}
$sql = "CREATE DATABASE IF NOT EXISTS todoapp";
// make query
$result = mysqli_query($conn, $sql);
mysqli_close($conn);





//create tables
$conn = mysqli_connect("localhost", "root", "", "todoapp");

if (!$conn) {
    echo "Connection Error" . mysqli_connect_error($conn);
}
$sql = "CREATE TABLE if not exists asks(
`id` INT PRIMARY KEY AUTO_INCREMENT,
`title` VARCHAR(200) NOT NULL
)";
// make query


$result =  mysqli_query($conn, $sql);
mysqli_close($conn);

echo "<pre>";
var_dump($conn);
