<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['enrollment_id'];
    $courseID = $_POST['course_id'];
    $dateNow = date('Y-m-d');

    $stmt = $conn->prepare("UPDATE enrollment SET CourseID=?, EnrollmentDate=? WHERE EnrollmentID=?");
    $stmt->bind_param("isi", $courseID, $dateNow, $id);
    $stmt->execute();
    header("Location: enroll.php");
    exit();
}

$id = $_GET['id'];
$res = $conn->query("SELECT e.*, p.FirstName, p.LastName FROM enrollment e JOIN student s ON e.StudentID = s.StudentID JOIN profile p ON s.UserID = p.UserID WHERE e.EnrollmentID = $id");
$data = $res->fetch_assoc();

include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Change Course Enrollment</h2>
        <form action="edit_enrollment.php" method="POST">
            <input type="hidden" name="enrollment_id" value="<?= $data['EnrollmentID'] ?>">
            
            <div class="form-group">
                <label>Student (Read-Only):</label>
                <input type="text" value="<?= $data['FirstName']." ".$data['LastName'] ?>" disabled>
            </div>

            <div class="form-group">
                <label>Change Course:</label>
                <select name="course_id" required style="width:100%; padding:12px; border-radius:8px; border:2px solid #e0e0e0;">
                    <?php
                    $courses = $conn->query("SELECT CourseID, CourseName FROM course");
                    while($c = $courses->fetch_assoc()) {
                        $selected = ($c['CourseID'] == $data['CourseID']) ? "selected" : "";
                        echo "<option value='".$c['CourseID']."' $selected>".$c['CourseName']."</option>";
                    }
                    ?>
                </select>
            </div>
            <p style="font-size: 0.8rem; color: #7f8c8d;">The 'Enrollment Date' will be updated to today.</p>
            <button type="submit" class="submit-btn">Update Enrollment</button>
        </form>
    </div>
</main>