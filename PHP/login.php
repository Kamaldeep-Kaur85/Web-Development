<?php
session_start();
$conn = new mysqli("localhost", "root", "", "users");
if ($conn->connect_error) die("Connection failed");
if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  $res = $conn->query("SELECT * FROM users 
                       WHERE name='$name' AND password='$password'");
  if ($res->num_rows > 0) {
    $user = $res->fetch_assoc();
    $_SESSION['username'] = $user['name'];
    header("Location: home.php");
  } else {
    echo "Invalid login!";
  }
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Login</h2>
<form method="POST">
  <input type="text" name="name" placeholder="Username" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button name="login">Login</button>
</form>
</body>
</html>