<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->begin_transaction();

    try {
        $stmt1 = $conn->prepare("INSERT INTO profile (FirstName, LastName, Phone, Role) VALUES (?, ?, ?, 'Committee')");
        $stmt1->bind_param("sss", $_POST['first_name'], $_POST['last_name'], $_POST['phone']);
        $stmt1->execute();
        $userID = $conn->insert_id;

        
        $stmt2 = $conn->prepare("INSERT INTO committee (UserID, Specialization) VALUES (?, ?)");
        $stmt2->bind_param("is", $userID, $_POST['specialization']);
        $stmt2->execute();

        $conn->commit();
        header("Location: admin.php");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error adding committee member: " . $e->getMessage();
    }
}
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Admin: Add Committee Member</h2>
        <form action="add_admin_committee.php" method="POST">
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
                <label>Specialization:</label>
                <input type="text" name="specialization" placeholder="e.g. Academic Oversight, Finance" required>
            </div>
            <button type="submit" class="submit-btn">Register Member</button>
        </form>
    </div>
</main>
</body>
</html>