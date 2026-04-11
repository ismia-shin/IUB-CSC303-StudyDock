<?php 
include 'db_connect.php'; 
include 'header.php'; 

$id = $_GET['id'];
$record = $conn->query("SELECT s.ReceivedGrade, p.FirstName, p.LastName, a.AssessmentName 
                        FROM submission s 
                        JOIN student st ON s.StudentID = st.StudentID 
                        JOIN profile p ON st.UserID = p.UserID 
                        JOIN assessment a ON s.AssessmentID = a.AssessmentID 
                        WHERE SubmissionID = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newGrade = $_POST['grade'];
    $conn->query("UPDATE submission SET ReceivedGrade = '$newGrade' WHERE SubmissionID = $id");
    header("Location: performance.php");
}
?>

<main>
    <div class="form-container">
        <h2>Edit Grade</h2>
        <p><strong>Student:</strong> <?= $record['FirstName'] . " " . $record['LastName'] ?></p>
        <p><strong>Assessment:</strong> <?= $record['AssessmentName'] ?></p>
        <form method="POST">
            <div class="form-group">
                <label>Received Grade</label>
                <input type="number" step="0.01" name="grade" value="<?= $record['ReceivedGrade'] ?>" max="100" required>
            </div>
            <button type="submit" class="submit-btn">Update Grade</button>
        </form>
    </div>
</main>