<?php
    $name = "contact";
    include 'connect.php';
    include 'includes/first.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username     = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $email 	      = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $tel 	      = filter_var($_POST['tel'],FILTER_SANITIZE_NUMBER_INT);
        $address      = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
        $date         = $_POST['date'];
        $order        = $_POST['order'];
        if (isset($username)) {
            if (strlen($username) < 4) {$formErrors[] = '<div class="alert alert-danger">username must be exist</div>';}
        }
        if (isset($email)) {$formErrors[] = '<div class="alert alert-danger">email must be exist</div>';}
        if (isset($tel)) {$formErrors[] = '<div class="alert alert-danger">phone number must be exist</div>';}
        if (isset($order)) {$formErrors[] = '<div class="alert alert-danger">order must be exist</div>';}
        if (empty($formErrors)) {
            $stmt = $con->prepare("INSERT INTO 
                        orders(name, email, phone, address, time, orders, reg, date)
                        VALUES(:zname, :zemail, :zphone, :zaddress, :ztime, :zorders, 0, now())");
            $stmt->execute(array(
                'zname'     => $username,
                'zemail'    => $email,
                'zphone'    => $tel,
                'zaddress'  => $address,
                'ztime'     => $date,
                'zorders'   => $order
            ));
            // Echo Success Message
            $succesMsg = '<div class="alert alert-success"> message was sent successfully, we will call you later</div>';
        }
    }
?>
<section class="section5 next">
    <div class="container">
        <div class="main">
            <h2>Requeast A Service</h2>
            <div class="the-errors text-center" style="font-size: 20px;">
                <?php 
                    if (!empty($formErrors)) {
                        foreach ($formErrors as $error) {
                            echo '<div class="msg error">' . $error . '</div>';
                        }
                    }
                    if (isset($succesMsg)) {
                        echo '<div class="msg success">' . $succesMsg . '</div>';
                    }
                ?>
            </div>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="form">
            <label><input type="text" placeholder=" Enter Your Name" name="username" required value="<?php if (isset($username)) {echo $username;}?>"></label>
            <label><input type="email" placeholder="Enter A Valid Email" name="email" required value="<?php if (isset($username)) {echo $username;}?>"></label>
            <label><input type="tel" placeholder="Enter Your Phone Number" name="tel" required value="<?php if (isset($username)) {echo $username;}?>"></label>
            <label><input type="text" placeholder="Your Address" name="address" required value="<?php if (isset($username)) {echo $username;}?>"></label>
            <label><input type="text" placeholder="Time Required to do your jop" name="date" onfocus="(this.type='date')"></label>
            <label><textarea name="order" placeholder="your order" required value="<?php if (isset($username)) {echo $username;}?>"></textarea></label>
            <input type="submit" value="Send" class="red butn">
        </form>
        <h3>Social Media</h3>
        <ul>
            <li><a href="index.php"><i class="fa fa-facebook-official"></i></a></li>
            <li><a href="about.php"><i class="fa fa-google"></i></a></li>
            <li><a href="services.php"><i class="fa fa-youtube-square"></i></a></li>
        </ul>
    </div>
</section>
<section class="section3">
    <h4>See our services now and let's start our journey</h4>
    <a href="services.php" class="button">Our Services</a>
</section>
<hr>
<?php include 'includes/last.php'; ?>