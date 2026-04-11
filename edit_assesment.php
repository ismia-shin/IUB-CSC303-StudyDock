<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $marks = $_POST['marks'];
    $date = $_POST['sub_date'];

    $stmt = $conn->prepare("UPDATE assessment SET AssessmentName=?, TotalMarks=?, SubmissionDate=? WHERE AssessmentID=?");
    $stmt->bind_param("sdsi", $name, $marks, $date, $id);
    $stmt->execute();
    header("Location: assesment.php");
    exit();
}

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM assessment WHERE AssessmentID = $id");
$data = $res->fetch_assoc();
include 'header.php';
?>

<main>
    <div class="form-container">
        <h2>Edit Assessment</h2>
        <form action="edit_assesment.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['AssessmentID'] ?>">
            
            <div class="form-group">
                <label>Assessment Name</label>
                <input type="text" name="name" value="<?= htmlspecialchars($data['AssessmentName']) ?>" required>
            </div>
            <div class="form-group">
                <label>Total Marks</label>
                <input type="number" step="0.01" name="marks" value="<?= $data['TotalMarks'] ?>" required>
            </div>
            <div class="form-group">
                <label>Submission Date</label>
                <input type="date" name="sub_date" value="<?= $data['SubmissionDate'] ?>" required>
            </div>

            <button type="submit" class="submit-btn">Update Details</button>
        </form>
    </div>
</main>