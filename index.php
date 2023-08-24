<?php session_start();
$conn = mysqli_connect("localhost", "root", "", "todoapp");
if (!$conn) {
    echo "connection error " . mysqli_connect_error($conn);
}
$sql = "SELECT * FROM `tasks` ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Todo App</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="todo-container">
        <h1 style="text-align:center;">Todo List</h1>

        <form action="store-task.php" method="POST">

            <input type="text" name="title" placeholder="Enter a new task" required>
            <button type="submit">Add Task</button>

        </form>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert" style="text-align:center;">
                <div class="alert" style="padding: 7px;margin: auto;text-align: center;background: #28a745;border-radius: 6px;">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>

                </div>

            <?php endif; ?>

            <div class=" col-12">
                <table>
                    <thead>



                        <tr>
                            <th>#</th>
                            <th>tasks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <?php //var_dump($row);
                            //die; 
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td>
                                    <a href=" delete_task.php?id=<?php echo $row['id'] ?>"><button>Delete</button></a>
                                    <a href=" update.php?id=<?php echo $row['id'] ?>"><button>Edit</button></a>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            </div>
    </div>

</body>

</html>