<?php
session_start();
$error = [];
if (isset($_GET['id'])) {

    $conn = mysqli_connect("localhost", "root", "", "todoapp");
    if (!$conn) {
        $_SESSION['error']  = "Connection Error" . mysqli_connect_error($conn);
    }
    $id = $_GET['id'];
    $sql = " SELECT * FROM  `tasks` WHERE `id` = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);

    if (!$row) {
        $_SESSION['error']  = "data not exists";
    } else {

        $sql = "DELETE FROM `tasks` WHERE `id` = '$id' ";
        $result = mysqli_query($conn, $sql);
        $_SESSION['success']  = "data deleted succesfully ";
    }
    //redirection
    header("location:index.php");
}
