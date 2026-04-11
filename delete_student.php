<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $studentID = $_GET['id'];


    $stmt = $conn->prepare("SELECT UserID FROM student WHERE StudentID = ?");
    $stmt->bind_param("i", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $userID = $row['UserID'];
        

        $deleteStmt = $conn->prepare("DELETE FROM profile WHERE UserID = ?");
        $deleteStmt->bind_param("i", $userID);
        $deleteStmt->execute();
        $deleteStmt->close();
    }
    $stmt->close();
}


header("Location: profile.php");
exit();
?>