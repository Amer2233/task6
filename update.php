<?php
session_start();
$error = [];
if (isset($_GET['id'])) {

    $conn = mysqli_connect("localhost", "root", "", "todoapp");
    if (!$conn) {
        $_SESSION['success']  = "Connection Error" . mysqli_connect_error($conn);
    }
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="todo-container ">
        <h1 style="text-align:center;">Edit</h1>
        <form action=" edit.php?id=id&new_value=new_value" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="new_value" id="new_value">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>

</body>

</html>