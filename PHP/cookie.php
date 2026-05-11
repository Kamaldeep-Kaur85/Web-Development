<?php
// SET COOKIE
if (isset($_POST['set'])) {
  $name = $_POST['username'];
  setcookie("username", $name, time() + 3600); // 1 hour
  header("Location: cookie.php"); // refresh page
}
// DELETE COOKIE
if (isset($_POST['delete'])) {
  setcookie("username", "", time() - 3600);// expire cookie
 echo "Cookie deleted";
  header("Location: cookie.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cookie Example</title>
</head>
<body>
<h2>Cookie Demo</h2>
<!-- Form to set cookie -->
<form method="POST">
  <input type="text" name="username" placeholder="Enter name" required>
  <button type="submit" name="set">Set Cookie</button>
</form>
<br>
<!-- Display cookie -->
<?php
if (isset($_COOKIE['username'])) {
  echo "<h3>Welcome, " . $_COOKIE['username'] . "</h3>";
} else {
  echo "<h3>No cookie found</h3>";
}
?>
<br>
<form method="POST">
  <button type="submit" name="delete">Delete Cookie</button>
</form>
</body>
</html>