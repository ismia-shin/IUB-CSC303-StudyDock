<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $dob = $_POST['dob'];
    $major = trim($_POST['major']);
    $street = trim($_POST['street']);
    $city = trim($_POST['city']);
    $country = trim($_POST['country']);
    

    $stmt1 = $conn->prepare("INSERT INTO profile (FirstName, LastName, Phone, Role) VALUES (?, ?, ?, 'Student')");
    $stmt1->bind_param("sss", $firstName, $lastName, $phone);
    
    if ($stmt1->execute()) {
        $userID = $conn->insert_id; 
        

        $stmt2 = $conn->prepare("INSERT INTO student (UserID, DateOfBirth, Major, Street, City, Country) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("isssss", $userID, $dob, $major, $street, $city, $country);
        $stmt2->execute();
        $stmt2->close();
        
        header("Location: profile.php"); 
        exit();
    }
    $stmt1->close();
}
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Add New Student</h2>
        <form action="add_student.php" method="POST">
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
                <input type="text" name="major">
            </div>
            <div class="form-group">
                <label>Street Address:</label>
                <input type="text" name="street" required>
            </div>
            <div class="form-group">
                <label>City:</label>
                <input type="text" name="city" required>
            </div>
            <div class="form-group">
                <label>Country:</label>
                <input type="text" name="country" required>
            </div>
            <button type="submit" class="submit-btn">Save Student</button>
        </form>
    </div>
</main>
</body>
</html>