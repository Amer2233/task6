<?php
session_start();
$error = [];
if (isset($_POST['submit'])) {


    $conn = mysqli_connect("localhost", "root", "", "todoapp");
    if (!$conn) {
        $_SESSION['success']  = "Connection Error" . mysqli_connect_error($conn);
    }

    $id = $_POST['id'];
    $new_value = $_POST['new_value'];
    $sql = " SELECT * FROM  `tasks` WHERE `id` = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);

    if (!$row) {
        $_SESSION['success']  = "data not exists";
    } else {

        $sql = "UPDATE `tasks` SET title='$new_value' where id=$id";
        // --$sql = "UPDATE `tasks` SET `id`='$id',`title`= '$new_value' WHERE 1 ";
        $_SESSION['success']  = "data Edited succesfully ";
        $result = mysqli_query($conn, $sql);
    }
    //redirection
    header("location:index.php");
}
