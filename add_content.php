<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['content_name']);
    $type = trim($_POST['content_type']);
    $link = trim($_POST['access_link']); 
    $dateNow = date('Y-m-d');
    
    $courseID = $_POST['course_id']; 

    $stmt = $conn->prepare("INSERT INTO content (ContentName, ContentType, DateUploaded, AccessLink, CourseID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $name, $type, $dateNow, $link, $courseID);
    
    if ($stmt->execute()) {
        header("Location: content.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Add New Content</h2>
        <form action="add_content.php" method="POST">
            <div class="form-group">
                <label>Content Name (e.g., Week 1 Slides):</label>
                <input type="text" name="content_name" required>
            </div>
            <div class="form-group">
                <label>Content Type (e.g., PDF, ZIP, Link):</label>
                <input type="text" name="content_type" required>
            </div>
            <div class="form-group">
                <label>Access Link / Path:</label>
                <input type="text" name="access_link" placeholder="Paste link or local path here" required>
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
            <button type="submit" class="submit-btn">Upload Content</button>
        </form>
    </div>
</main>