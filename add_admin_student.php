<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->begin_transaction();

    try {
        $stmt1 = $conn->prepare("INSERT INTO profile (FirstName, LastName, Phone, Role) VALUES (?, ?, ?, 'Student')");
        $stmt1->bind_param("sss", $_POST['first_name'], $_POST['last_name'], $_POST['phone']);
        $stmt1->execute();
        $userID = $conn->insert_id;

        $stmt2 = $conn->prepare("INSERT INTO student (UserID, DateOfBirth, Major, Street, City, Country) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("isssss", $userID, $_POST['dob'], $_POST['major'], $_POST['street'], $_POST['city'], $_POST['country']);
        $stmt2->execute();

        $conn->commit();
        header("Location: admin.php");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error adding student: " . $e->getMessage();
    }
}
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Admin: Add New Student</h2>
        <form action="add_admin_student.php" method="POST">
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" required>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="text" name="phone">
            </div>
            <div class="form-group">
                <label>Date of Birth:</label>
                <input type="date" name="dob" required>
            </div>
            <div class="form-group">
                <label>Major:</label>
                <input type="text" name="major" required>
            </div>
            <div class="form-group">
                <label>Street Address:</label>
                <input type="text" name="street">
            </div>
            <div class="form-group">
                <label>City:</label>
                <input type="text" name="city">
            </div>
            <div class="form-group">
                <label>Country:</label>
                <input type="text" name="country">
            </div>
            <button type="submit" class="submit-btn">Register Student</button>
        </form>
    </div>
</main>
</body>
</html>