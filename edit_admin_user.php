<?php
include 'db_connect.php';
$role = $_GET['role'];
$id = $_GET['id'];


if($role == 'Student') {
    $data = $conn->query("SELECT * FROM profile p JOIN student s ON p.UserID = s.UserID WHERE s.StudentID = $id")->fetch_assoc();
} elseif($role == 'Instructor') {
    $data = $conn->query("SELECT * FROM profile p JOIN instructor i ON p.UserID = i.UserID WHERE i.InstructorID = $id")->fetch_assoc();
} else {
    $data = $conn->query("SELECT * FROM profile p JOIN committee c ON p.UserID = c.UserID WHERE c.CommitteeID = $id")->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $data['UserID'];
    $conn->query("UPDATE profile SET FirstName='{$_POST['fn']}', LastName='{$_POST['ln']}', Phone='{$_POST['ph']}' WHERE UserID=$uid");
    
    if($role == 'Student') {
        $conn->query("UPDATE student SET Major='{$_POST['maj']}', City='{$_POST['city']}', Street='{$_POST['str']}', Country='{$_POST['ctr']}', DateOfBirth='{$_POST['dob']}' WHERE StudentID=$id");
    } elseif($role == 'Instructor') {
        $conn->query("UPDATE instructor SET Department='{$_POST['dept']}', University='{$_POST['uni']}', Degree='{$_POST['deg']}', Subject='{$_POST['sub']}' WHERE InstructorID=$id");
    } else {
        $conn->query("UPDATE committee SET Specialization='{$_POST['spec']}' WHERE CommitteeID=$id");
    }
    header("Location: admin.php");
}
include 'header.php';
?>
<main><div class="form-container">
    <h2>Edit <?php echo $role; ?> (All Access)</h2>
    <form method="POST">
        <div class="form-group"><label>First Name:</label><input type="text" name="fn" value="<?= $data['FirstName'] ?>"></div>
        <div class="form-group"><label>Last Name:</label><input type="text" name="ln" value="<?= $data['LastName'] ?>"></div>
        <div class="form-group"><label>Phone:</label><input type="text" name="ph" value="<?= $data['Phone'] ?>"></div>

        <?php if($role == 'Student'): ?>
            <div class="form-group"><label>Major:</label><input type="text" name="maj" value="<?= $data['Major'] ?>"></div>
            <div class="form-group"><label>City:</label><input type="text" name="city" value="<?= $data['City'] ?>"></div>
            <div class="form-group"><label>Street:</label><input type="text" name="str" value="<?= $data['Street'] ?>"></div>
            <div class="form-group"><label>Country:</label><input type="text" name="ctr" value="<?= $data['Country'] ?>"></div>
            <div class="form-group"><label>DOB:</label><input type="date" name="dob" value="<?= $data['DateOfBirth'] ?>"></div>
        <?php elseif($role == 'Instructor'): ?>
            <div class="form-group"><label>Dept:</label><input type="text" name="dept" value="<?= $data['Department'] ?>"></div>
            <div class="form-group"><label>University:</label><input type="text" name="uni" value="<?= $data['University'] ?>"></div>
            <div class="form-group"><label>Degree:</label><input type="text" name="deg" value="<?= $data['Degree'] ?>"></div>
            <div class="form-group"><label>Subject:</label><input type="text" name="sub" value="<?= $data['Subject'] ?>"></div>
        <?php else: ?>
            <div class="form-group"><label>Specialization:</label><input type="text" name="spec" value="<?= $data['Specialization'] ?>"></div>
        <?php endif; ?>
        <button type="submit" class="submit-btn">Update Profile</button>
    </form>
</div></main>