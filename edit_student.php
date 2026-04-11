<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['student_id'];
    $userID = $_POST['user_id'];
    
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $city = $_POST['city'];

    $stmt1 = $conn->prepare("UPDATE profile SET FirstName=?, LastName=?, Phone=? WHERE UserID=?");
    $stmt1->bind_param("sssi", $firstName, $lastName, $phone, $userID);
    $stmt1->execute();
    $stmt1->close();
    
    $stmt2 = $conn->prepare("UPDATE student SET Street=?, City=? WHERE StudentID=?");
    $stmt2->bind_param("ssi", $street, $city, $studentID);
    $stmt2->execute();
    $stmt2->close();
    
    header("Location: profile.php");
    exit();
}

if (isset($_GET['id'])) {
    $studentID = $_GET['id'];
    $sql = "SELECT s.StudentID, p.UserID, p.FirstName, p.LastName, p.Phone, s.Street, s.City 
            FROM student s 
            JOIN profile p ON s.UserID = p.UserID 
            WHERE s.StudentID = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();
} else {
    header("Location: profile.php");
    exit();
}
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Edit Student</h2>
        <form action="edit_student.php" method="POST">
            <input type="hidden" name="student_id" value="<?php echo $student['StudentID']; ?>">
            <input type="hidden" name="user_id" value="<?php echo $student['UserID']; ?>">
            
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($student['FirstName']); ?>" required>
            </div>
            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($student['LastName']); ?>" required>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($student['Phone'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label>Street Address:</label>
                <input type="text" name="street" value="<?php echo htmlspecialchars($student['Street']); ?>" required>
            </div>
            <div class="form-group">
                <label>City:</label>
                <input type="text" name="city" value="<?php echo htmlspecialchars($student['City']); ?>" required>
            </div>
            <button type="submit" class="submit-btn">Update Details</button>
        </form>
    </div>
</main>