<?php
$conn = new mysqli("localhost", "root", "", "users");
if ($conn->connect_error) die("Connection failed");
// DELETE
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM users WHERE id=$id");
  header("Location: p41.php");
}
// UPDATE
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
  header("Location: p41.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Users</title>
  <style>
    table { border-collapse: collapse; width: 70%; margin: auto; }
    th, td { border: 1px solid black; padding: 8px; text-align: center; }
    th { background: #ddd; }
    form { display:inline; }
  </style>
</head>
<body>
<h2 style="text-align:center;">Manage Users</h2>
<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Action</th>
</tr>
<?php
$result = $conn->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()) {
?>
<tr>
<form method="POST">
  <td><?php echo $row['id']; ?></td>
  <td>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">
  </td>
  <td>
    <input type="email" name="email" value="<?php echo $row['email']; ?>">
  </td>
  <td>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <button type="submit" name="update">Update</button>
    <a href="p41.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
  </td>
</form>
</tr>
<?php } ?>
</table>
</body>
</html>