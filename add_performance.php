<?php 
include 'db_connect.php'; 
include 'header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['student_id'];
    $assessmentID = $_POST['assessment_id'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO submission (StudentID, AssessmentID, ReceivedGrade) VALUES ('$studentID', '$assessmentID', '$grade')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record added!'); window.location.href='performance.php';</script>";
    }
}
?>

<main>
    <div class="form-container">
        <h2>Add Performance Record</h2>
        <form method="POST">
            <div class="form-group">
                <label>Select Student</label>
                <select name="student_id" required style="width:100%; padding:10px; border-radius:8px;">
                    <?php
                    $res = $conn->query("SELECT s.StudentID, p.FirstName, p.LastName FROM student s JOIN profile p ON s.UserID = p.UserID");
                    while($row = $res->fetch_assoc()) echo "<option value='{$row['StudentID']}'>{$row['FirstName']} {$row['LastName']} (ID: {$row['StudentID']})</option>";
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Select Assessment (Course)</label>
                <select name="assessment_id" required style="width:100%; padding:10px; border-radius:8px;">
                    <?php
                    $res = $conn->query("SELECT a.AssessmentID, a.AssessmentName, c.CourseName FROM assessment a JOIN course c ON a.CourseID = c.CourseID");
                    while($row = $res->fetch_assoc()) echo "<option value='{$row['AssessmentID']}'>{$row['AssessmentName']} - {$row['CourseName']}</option>";
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Received Grade</label>
                <input type="number" step="0.01" name="grade" max="100" required>
            </div>
            <button type="submit" class="submit-btn">Save Performance</button>
        </form>
    </div>
</main>