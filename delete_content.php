<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM content WHERE ContentID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: content.php");
}
?>