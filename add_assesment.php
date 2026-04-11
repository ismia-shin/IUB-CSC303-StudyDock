<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $marks = $_POST['marks'];
    $date = $_POST['sub_date'];
    $courseID = $_POST['course_id'];

    $stmt = $conn->prepare("INSERT INTO assessment (AssessmentName, TotalMarks, SubmissionDate, CourseID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdsi", $name, $marks, $date, $courseID);
    
    if ($stmt->execute()) {
        header("Location: assesment.php");
        exit();
    }
}
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2>Add New Assessment</h2>
        <form action="add_assesment.php" method="POST">
            <div class="form-group">
                <label>Assessment Name</label>
                <input type="text" name="name" required placeholder="e.g., Final Project">
            </div>
            <div class="form-group">
                <label>Total Marks</label>
                <input type="number" step="0.01" name="marks" required>
            </div>
            <div class="form-group">
                <label>Submission Date</label>
                <input type="date" name="sub_date" required>
            </div>
            <div class="form-group">
                <label>Course</label>
                <select name="course_id" required style="width:100%; padding:12px; border-radius:8px; border:2px solid #e0e0e0;">
                    <option value="">-- Select Course --</option>
                    <?php
                    $courses = $conn->query("SELECT CourseID, CourseName FROM course");
                    while($c = $courses->fetch_assoc()) {
                        echo "<option value='".$c['CourseID']."'>".$c['CourseName']."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="submit-btn">Save Assessment</button>
        </form>
    </div>
</main>