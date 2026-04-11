<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['student_id'];
    $courseID = $_POST['course_id'];
    $dateNow = date('Y-m-d');

    $stmt = $conn->prepare("INSERT INTO enrollment (EnrollmentDate, StudentID, CourseID) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $dateNow, $studentID, $courseID);
    
    if ($stmt->execute()) {
        header("Location: enroll.php");
        exit();
    }
}
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">New Enrollment</h2>
        <form action="add_enrollment.php" method="POST">
            <div class="form-group">
                <label>Select Student:</label>
                <select name="student_id" required style="width:100%; padding:12px; border-radius:8px; border:2px solid #e0e0e0;">
                    <?php
                    $students = $conn->query("SELECT s.StudentID, p.FirstName, p.LastName FROM student s JOIN profile p ON s.UserID = p.UserID");
                    while($st = $students->fetch_assoc()) {
                        echo "<option value='".$st['StudentID']."'>".$st['FirstName']." ".$st['LastName']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Select Course:</label>
                <select name="course_id" required style="width:100%; padding:12px; border-radius:8px; border:2px solid #e0e0e0;">
                    <?php
                    $courses = $conn->query("SELECT CourseID, CourseName FROM course");
                    while($c = $courses->fetch_assoc()) {
                        echo "<option value='".$c['CourseID']."'>".$c['CourseName']."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="submit-btn">Confirm Enrollment</button>
        </form>
    </div>
</main>