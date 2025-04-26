<?php
// connect to database
include './db-connect.php';

// 1) Handle DELETE requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['delete'], $_POST['id_to_delete']) 
    && is_numeric($_POST['id_to_delete'])
) {
    $id_to_delete = (int) $_POST['id_to_delete'];

    $stmt = $conn->prepare("DELETE FROM customer_info WHERE id = ?");
    $stmt->bind_param("i", $id_to_delete);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header('Location: index.php');
        exit();
    } else {
        echo "Delete failed: " . htmlspecialchars($stmt->error);
        $stmt->close();
        $conn->close();
        exit();
    }
}

// 2) Make sure we got an "id" in the URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
}
$id = (int) $_GET['id'];

// 3) Fetch that one order
$stmt = $conn->prepare("
    SELECT name, email, phone, items
      FROM customer_info
     WHERE id = ?
    LIMIT 1
");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$order  = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/header.php'; ?>

  <div class="container center">
    <?php if ($order): ?>
      <h4><?= htmlspecialchars($order['name']) ?></h4>
      <p><strong>Created by:</strong> <?= htmlspecialchars($order['email']) ?></p>
      <p><strong>Phone Number:</strong> <?= htmlspecialchars($order['phone']) ?></p>
      <h5>Items Ordered:</h5>
      <p><?= nl2br(htmlspecialchars($order['items'])) ?></p>

      <!-- DELETE FORM -->
      <form action="details.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="id_to_delete" value="<?= $id ?>">
        <button type="submit" name="delete" class="btn red">Delete Order</button>
      </form>
    <?php else: ?>
      <h5>Sorry, that order doesn’t exist.</h5>
    <?php endif; ?>
  </div>

  <?php include 'templates/footer.php'; ?>
</body>
</html>
