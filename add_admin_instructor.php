<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->begin_transaction();
    try {
        $stmt1 = $conn->prepare("INSERT INTO profile (FirstName, LastName, Phone, Role) VALUES (?, ?, ?, 'Instructor')");
        $stmt1->bind_param("sss", $_POST['fn'], $_POST['ln'], $_POST['ph']);
        $stmt1->execute();
        $uid = $conn->insert_id;

        $stmt2 = $conn->prepare("INSERT INTO instructor (UserID, Department, University, Degree, Subject) VALUES (?, ?, ?, ?, ?)");
        $stmt2->bind_param("issss", $uid, $_POST['dept'], $_POST['uni'], $_POST['deg'], $_POST['sub']);
        $stmt2->execute();

        $conn->commit();
        header("Location: admin.php");
    } catch (Exception $e) { $conn->rollback(); echo "Error: " . $e->getMessage(); }
}
include 'header.php';
?>
<main><div class="form-container">
    <h2>Add New Instructor</h2>
    <form method="POST">
        <div class="form-group"><label>First Name:</label><input type="text" name="fn" required></div>
        <div class="form-group"><label>Last Name:</label><input type="text" name="ln" required></div>
        <div class="form-group"><label>Phone:</label><input type="text" name="ph"></div>
        <div class="form-group"><label>Department:</label><input type="text" name="dept"></div>
        <div class="form-group"><label>University:</label><input type="text" name="uni"></div>
        <div class="form-group"><label>Degree:</label><input type="text" name="deg"></div>
        <div class="form-group"><label>Subject:</label><input type="text" name="sub"></div>
        <button type="submit" class="submit-btn">Save Instructor</button>
    </form>
</div></main>