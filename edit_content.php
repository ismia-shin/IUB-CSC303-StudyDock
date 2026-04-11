<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['content_id'];
    $type = trim($_POST['content_type']);
    $link = trim($_POST['access_link']);
    $dateNow = date('Y-m-d'); 

    $stmt = $conn->prepare("UPDATE content SET ContentType=?, AccessLink=?, DateUploaded=? WHERE ContentID=?");
    $stmt->bind_param("sssi", $type, $link, $dateNow, $id);
    $stmt->execute();
    header("Location: content.php");
    exit();
}

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM content WHERE ContentID = $id");
$data = $res->fetch_assoc();

include 'header.php';
?>

<main>
    <div class="form-container">
        <h2 style="color: #2c3e50; border-left: 5px solid #14abd0; padding-left: 15px;">Edit Content</h2>
        <form action="edit_content.php" method="POST">
            <input type="hidden" name="content_id" value="<?= $data['ContentID'] ?>">
            
            <div class="form-group">
                <label>Content Name (Read-Only):</label>
                <input type="text" value="<?= $data['ContentName'] ?>" disabled>
            </div>
            <div class="form-group">
                <label>Content Type:</label>
                <input type="text" name="content_type" value="<?= $data['ContentType'] ?>" required>
            </div>
            <div class="form-group">
                <label>Access Link:</label>
                <input type="url" name="access_link" value="<?= $data['AccessLink'] ?>" required>
            </div>
            <p style="font-size: 0.8rem; color: #7f8c8d;">The 'Date Uploaded' will be updated to today's date upon saving.</p>
            <button type="submit" class="submit-btn">Save Changes</button>
        </form>
    </div>
</main>