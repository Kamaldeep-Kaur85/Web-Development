<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "Please login first";
  exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Welcome</h2>
<p>Hello, <?php echo $_SESSION['username']; ?> </p>
<a href="logout.php">Logout</a>
</body>
</html>