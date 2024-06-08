<?php
include 'connect.php';
$data = array();
$sql = "SELECT * FROM `discussion` ORDER BY id DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
}

echo json_encode($data);
$conn = null;
exit();
?>

