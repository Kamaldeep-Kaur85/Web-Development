<!DOCTYPE html>
<html>
<head>
  <title>View Users</title>
  <style>
    table { border-collapse: collapse; width: 60%; margin: 20px auto; }
    th, td { border: 1px solid black; padding: 8px; text-align: center; }
    th { background-color: #f2f2f2; }
  </style>
</head>

<body>
<h2 style="text-align:center;">User Data</h2>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
  </tr>
<?php
$conn = new mysqli("localhost", "root", "", "users");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='3'>No data found</td></tr>";
}
$conn->close();
?>
</table>

</body>
</html>