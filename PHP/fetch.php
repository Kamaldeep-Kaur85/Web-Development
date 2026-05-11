<?php
$conn = new mysqli("localhost", "root", "", "users");
if ($conn->connect_error) die("Connection failed");
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}
echo json_encode($data);
?>