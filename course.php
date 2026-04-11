<?php
include 'db_connect.php';
include 'header.php';
?>

<main>
    <div class="search-container">
        <input type="search" placeholder="Search for Course..." id="search">
    </div>

    <div class="info-container">
        <h2>Course Management</h2>
    </div>

    <div id="btn-container">
        <a href="add_course.php"><button>Add new</button></a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Instructor</th> <th>Credit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT c.CourseID, c.CourseName, c.Credit, p.FirstName, p.LastName 
                    FROM course c
                    LEFT JOIN instructor i ON c.InstructorID = i.InstructorID
                    LEFT JOIN profile p ON i.UserID = p.UserID";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $instructorName = $row['FirstName'] ? $row['FirstName'] . " " . $row['LastName'] : "Not Assigned";
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['CourseID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['CourseName']) . "</td>";
                    echo "<td>" . htmlspecialchars($instructorName) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Credit']) . "</td>";
                    echo "<td>
                            <a href='delete_course.php?id=" . $row['CourseID'] . "' onclick=\"return confirm('Delete this course?');\"><button>Delete</button></a>
                            <a href='edit_course.php?id=" . $row['CourseID'] . "'><button>Edit</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='7' style='text-align:center; padding: 40px; color: #7f8c8d;'>
                            <div style='font-size: 1.2rem; margin-bottom: 10px;'>📚 No Course found.</div>
                            <p>It looks like there's nothing here yet. Try teaching something you are good at!</p>
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