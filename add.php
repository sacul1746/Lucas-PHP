<?php
include("./db-connect.php");

// Initialize variables
$name = null;
$phone = null;
$email = null;
$order = null;

// Handle form submission
if (isset($_POST['submit'])) {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $order = mysqli_real_escape_string($conn, $_POST['order']);

  //Creates order form for order  
    if ($name && $phone && $email && $order) {
        $sql = "INSERT INTO customer_info(name, email, phone, items) VALUES('$name','$email','$phone','$order')";
        mysqli_query($conn, $sql);
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Place Your Order</h4>
    <form action="add.php" class="white" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Phone Number:</label>
        <input type="text" name="number" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Order:</label>
        <input type="text" name="order" required>

        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<section class="container">
    <h4 class="center">Our Menu</h4>
    <div class="row">
        <div class="col s12 m4 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="images/coffe.jpeg" alt="coffee" style="width:100%; height:200px; object-fit:cover;">
                    <span class="card-title">Coffee</span>
                </div>
                <div class="card-content">
                    <p>Fresh coffee to kickstart your day.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="images/latte.jpeg" alt="latte" style="width:100%; height:200px; object-fit:cover;">
                    <span class="card-title">Latte</span>
                </div>
                <div class="card-content">
                    <p>Smooth espresso with steamed milk.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="images/banana.jpeg" alt="banana bread" style="width:100%; height:200px; object-fit:cover;">
                    <span class="card-title">Banana Bread</span>
                </div>
                <div class="card-content">
                    <p>Banana bread with soft chocolate chips.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="images/crossaint.jpeg" alt="crossaint" style="width:100%; height:200px; object-fit:cover;">
                    <span class="card-title">Crossaint</span>
                </div>
                <div class="card-content">
                    <p>Crossaint with creamy chocolate filling.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="images/brektaco.jpeg" alt="breakfast taco" style="width:100%; height:200px; object-fit:cover;">
                    <span class="card-title">Breakfast Taco</span>
                </div>
                <div class="card-content">
                    <p>Breakfast taco with egg, cheese, and potatos.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="images/boba.jpeg" alt="boba" style="width:100%; height:200px; object-fit:cover;">
                    <span class="card-title">Boba</span>
                </div>
                <div class="card-content">
                    <p> Bubbly boba drink.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="images/cakepop.jpeg" alt="cakepop" style="width:100%; height:200px; object-fit:cover;">
                    <span class="card-title">Cakepop</span>
                </div>
                <div class="card-content">
                    <p> Chocolate cakepop with creamy chocolate filling.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m4 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="images/brekataco.jpeg" alt="southern breakfast Taco" style="width:100%; height:200px; object-fit:cover;">
                    <span class="card-title">Southern Breakfast Taco</span>
                </div>
                <div class="card-content">
                    <p> Breakfast taco with egg, bacon, and peppers.</p>
                </div>
            </div>
        </div>

        <!-- Add more menu items as additional .col elements -->
    </div>
</section>

<?php include('templates/footer.php'); ?>
</body>
</html>