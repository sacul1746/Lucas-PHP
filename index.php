<?php
// connect to database
include('./db-connect.php');

// write query for coffee orders
$sql    = 'SELECT id, name, phone, email, items FROM customer_info';
$result = mysqli_query($conn, $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('templates/header.php'); ?>

  <section class="container">
    <h4 class="center grey-text">Coffee Orders!</h4>
    <div class="row">
      <?php foreach ($orders as $order): ?>
        <div class="col s6 m3">
          <!-- Make the entire card clickable and pass the order ID -->
          <a href="details.php?id=<?= $order['id'] ?>" style="display: block; text-decoration: none;">
            <div class="card z-depth-0 hoverable">
              <div class="card-content center">
                <h6 class="brand-text"><?= htmlspecialchars($order['name']) ?></h6>
                <ul>
                  <?php foreach (explode(',', $order['items']) as $item): ?>
                    <li class="brand-text"><?= htmlspecialchars($item) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php include('templates/footer.php'); ?>
</body>
</html>
