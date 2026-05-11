<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
</head>
<body>
<h2>User Registration</h2>
<form method="POST">
  <input type="text" name="name" placeholder="Name" required><br><br>
  <input type="email" name="email" placeholder="Email" required><br><br>
  <input type="password" name="password" placeholder="Password" required><br><br>
  <button type="submit">Register</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = new mysqli("localhost", "root", "", "users");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (name, email, password)
          VALUES ('$name', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green;'>Registration successful!</p>";
  } else {
    echo "Error: " . $conn->error;
  }
  $conn->close();
}
?>
</body>
</html>