<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM enrollment WHERE EnrollmentID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: enroll.php");
}
?>