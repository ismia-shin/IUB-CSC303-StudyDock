<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseName = trim($_POST['course_name']);
    $credit = $_POST['credit'];
    $instructorID = $_POST['instructor_id'];

    $stmt = $conn->prepare("INSERT INTO course (CourseName, Credit, InstructorID) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $courseName, $credit, $instructorID);
    
    if ($stmt->execute()) {
        header("Location: course.php");
        exit();
    }
    $stmt->close();
}
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Add New Course</h2>
        <form action="add_course.php" method="POST">
            <div class="form-group">
                <label>Course Name:</label>
                <input type="text" name="course_name" required>
            </div>
            <div class="form-group">
                <label>Credit Hours:</label>
                <input type="number" name="credit" min="1" max="4" required>
            </div>
            <div class="form-group">
                <label>Assign Instructor:</label>
                <select name="instructor_id" style="width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                    <option value="">Select Instructor</option>
                    <?php
                    $res = $conn->query("SELECT i.InstructorID, p.FirstName, p.LastName FROM instructor i JOIN profile p ON i.UserID = p.UserID");
                    while($row = $res->fetch_assoc()) {
                        echo "<option value='".$row['InstructorID']."'>".$row['FirstName']." ".$row['LastName']."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="submit-btn">Create Course</button>
        </form>
    </div>
</main>