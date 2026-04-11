<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM course WHERE CourseID = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: course.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
}
?>