<?php
include 'db_connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM submission WHERE SubmissionID = $id");
}
header("Location: performance.php");
?>