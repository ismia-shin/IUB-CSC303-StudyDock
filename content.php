<?php
include 'db_connect.php';
include 'header.php';
?>

<main>
    <div class="search-container">
        <input type="search" placeholder="Search for content..." id="search">
    </div>

    <div class="info-container">
        <h2>Content Management</h2>
    </div>

    <div id="btn-container">
        <a href="add_content.php"><button>Add New Content</button></a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Content Name</th>
                <th>Course</th>
                <th>Type</th>
                <th>Date</th>
                <th>Link</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT c.*, co.CourseName 
                    FROM content c 
                    JOIN course co ON c.CourseID = co.CourseID 
                    ORDER BY c.DateUploaded DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['ContentID'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['ContentName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['CourseName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ContentType']) . "</td>";
                    echo "<td>" . $row['DateUploaded'] . "</td>";
                    echo "<td><a href='" . htmlspecialchars($row['AccessLink']) . "' target='_blank'>View</a></td>";
                    echo "<td>
                            <a href='edit_content.php?id=" . $row['ContentID'] . "'><button>Edit</button></a>
                            <a href='delete_content.php?id=" . $row['ContentID'] . "' onclick=\"return confirm('Delete this item?');\"><button>Delete</button></a>
                        </td>";
                    echo "</tr>";
                }
            } else {

                echo "<tr>
                        <td colspan='7' style='text-align:center; padding: 40px; color: #7f8c8d;'>
                            <div style='font-size: 1.2rem; margin-bottom: 10px;'>📂 No content found.</div>
                            <p>It looks like there's nothing here yet. Try adding some new material!</p>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</main>
<script src="index.js"></script>
</body>
</html>