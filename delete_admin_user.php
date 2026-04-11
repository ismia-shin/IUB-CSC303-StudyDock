<?php
include 'db_connect.php';
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $stmt = $conn->prepare("DELETE FROM profile WHERE UserID = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    header("Location: admin.php");
}
?>