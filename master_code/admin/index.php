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
		header('Location: order.php'); 
	}
	include '../connect.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['pass'];
        $hashedPass = sha1($password);
		$stmt = $con->prepare("SELECT password FROM password WHERE password = ? LIMIT 1");
		$stmt->execute(array($hashedPass));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();
		if ($count > 0) {
			$_SESSION['password'] = $hashedPass; 
			header('Location: order.php');
		}
    }
    ob_end_flush(); 
?>
    <div class="login-page">
        <form class="password" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="login text-center">
                <div class="form">
                    <i class="i fa fa-user-circle fa-4x"></i>
                    <h1 class="blue">login</h1>
                    <input class="form-control" type="password" name="pass" placeholder="Enter Password" autocomplete="new-password" />
                    <input class="btn btn-primary btn-block click" type="submit" value="Login" />
                </div>
            </div>
        </form>
    </div>    
</body>
<script src="../js/bootstrap.min.js"></script>
</html>