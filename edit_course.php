<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseID = $_POST['course_id'];
    $courseName = $_POST['course_name'];
    $credit = $_POST['credit'];


    $stmt = $conn->prepare("UPDATE course SET CourseName=?, Credit=? WHERE CourseID=?");
    $stmt->bind_param("sii", $courseName, $credit, $courseID);
    $stmt->execute();
    header("Location: course.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM course WHERE CourseID = $id");
$course = $result->fetch_assoc();

include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Edit Course Details</h2>
        <form action="edit_course.php" method="POST">
            <input type="hidden" name="course_id" value="<?= $course['CourseID'] ?>">
            
            <div class="form-group">
                <label>Course Name:</label>
                <input type="text" name="course_name" value="<?= htmlspecialchars($course['CourseName']) ?>" required>
            </div>
            <div class="form-group">
                <label>Credit:</label>
                <input type="number" name="credit" value="<?= htmlspecialchars($course['Credit']) ?>" required>
            </div>
            
            <p style="font-size: 0.8rem; color: #7f8c8d;">Note: Instructor assignment cannot be changed from this screen.</p>
            <button type="submit" class="submit-btn">Update Course</button>
        </form>
    </div>
</main>