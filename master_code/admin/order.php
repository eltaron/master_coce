<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/indexs.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>master code</title>
</head>
<body>
    <?php
    ob_start(); 
	session_start();
    if (isset($_SESSION['password'])) {
        include '../connect.php';
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
        if ($do == 'Manage') { 
            $stmt = $con->prepare("SELECT * FROM orders");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            if (! empty($rows)) {
            ?>
            <div class="manage">
                <h1 class="text-center">orders</h1>
                <div class="container">
                    <div class="table-responsive">
                        <table class="main-table manage-members text-center table table-bordered">
                            <tr class="table-secondary" style="color: black; font-size: 22px; font-weight: bold;">
                                <td>id</td>
                                <td>username</td>
                                <td>email</td>
                                <td>phone</td>
                                <td>address</td>
                                <td>time required</td>
                                <td>order</td>
                                <td>date</td>
                                <td>status</td>
                            </tr>
                            <?php
                                foreach($rows as $row) {
                                    if ($row['reg'] == 0) {
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] ."</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['phone'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>" . $row['time'] . "</td>";
                                            echo "<td>" . $row['orders'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>
                                                    <a href='order.php?do=Delete&userid=" . $row['id'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
                                                    if ($row['reg'] == 0) {
                                                        echo "<a 
                                                                href='order.php?do=Activate&userid=" . $row['id'] . "' 
                                                                class='btn btn-info activate'>
                                                                <i class='fa fa-check'></i> Activate</a>";
                                                    }
                                                echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                            <tr>
                        </table>
                    </div>
                </div>
            </div>
            <?php } else {
                echo '<div class="container">';
                    echo '<div class="message">there is no message to show</div>';
                echo '</div>';
            }
        } elseif ($do == 'Delete') {
        echo "<h1 class='text-center' style='color: #fff'>Delete</h1>";
        echo "<div class='container'>";
            $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
            $stmt = $con->prepare("SELECT id  FROM orders WHERE id = ?");
            $stmt->execute(array($userid));
            $count = $stmt->rowCount();
            if ($count > 0) {
                $stmt = $con->prepare("DELETE FROM orders WHERE id = :zuser");
                $stmt->bindParam(":zuser", $userid);
                $stmt->execute();
                $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';
                echo $theMsg;
                echo "<div class='alert alert-info'>you will go back in 3 seconds</div>";
                header("refresh:3;url='order.php'");
                exit();
            } else {
                $theMsg = '<div class="alert alert-danger">there is no order with this id</div>';
                echo $theMsg;
                echo "<div class='alert alert-info'>you will go back in 3 seconds</div>";
                header("refresh:3;url='order.php'");
            }
        echo '</div>';
        } elseif ($do == 'Activate') {
            echo "<h1 class='text-center' style='color: #fff'>Activate</h1>";
            echo "<div class='container'>";
                $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
                $stmt = $con->prepare("SELECT id  FROM orders WHERE id = ?");
                $stmt->execute(array($userid));
                $count = $stmt->rowCount();
                if ($count > 0) {
                    $stmt = $con->prepare("UPDATE  orders SET reg = 1 WHERE id = :zuser");
                    $stmt->bindParam(":zuser", $userid);
                    $stmt->execute();
                    $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';
                    echo $theMsg;
                    echo "<div class='alert alert-info'>you will go back in 3 seconds</div>";
                    header("refresh:3;url='order.php'");
                } else {
                    $theMsg = '<div class="alert alert-danger">there is no order with this id</div>';
                    echo $theMsg;
                    echo "<div class='alert alert-info'>you will go back in 3 seconds</div>";
                    header("refresh:3;url='order.php'");
                }
            echo '</div>';
        }
    } else {
		header('Location: index.php');
		exit();
	}
    ob_end_flush(); 
?>
</body>
<script src="../js/bootstrap.min.js"></script>
</html>