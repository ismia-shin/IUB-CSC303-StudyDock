<?php
include 'db_connect.php';
include 'header.php';
?>

<main>
    <div class="search-container">
        <input type="search" placeholder="Search assessments..." id="search">
    </div>

    <div class="info-container">
        <h2>Assessment Management</h2>
    </div>

    <div id="btn-container">
        <a href="add_assesment.php"><button>Add New Assessment</button></a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Assessment Name</th>
                <th>Course</th>
                <th>Instructor</th>
                <th>Total Marks</th>
                <th>Submission Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT a.*, c.CourseName, p.FirstName, p.LastName 
                    FROM assessment a
                    JOIN course c ON a.CourseID = c.CourseID
                    LEFT JOIN instructor i ON c.InstructorID = i.InstructorID
                    LEFT JOIN profile p ON i.UserID = p.UserID
                    ORDER BY a.SubmissionDate ASC";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $instructor = ($row['FirstName']) ? $row['FirstName']." ".$row['LastName'] : "Not Assigned";
                    echo "<tr>";
                    echo "<td>" . $row['AssessmentID'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['AssessmentName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['CourseName']) . "</td>";
                    echo "<td>" . htmlspecialchars($instructor) . "</td>";
                    echo "<td>" . $row['TotalMarks'] . "</td>";
                    echo "<td>" . ($row['SubmissionDate'] ?? 'TBD') . "</td>";
                    echo "<td>
                            <a href='edit_assesment.php?id=" . $row['AssessmentID'] . "'><button>Edit</button></a>
                            <a href='delete_assesment.php?id=" . $row['AssessmentID'] . "' onclick=\"return confirm('Delete this assessment?');\"><button>Delete</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='7' style='text-align:center; padding: 40px; color: #7f8c8d;'>
                            <div style='font-size: 1.2rem; margin-bottom: 10px;'>📑 No Assesment found.</div>
                            <p>It looks like there's nothing here yet. Try adding some new assesment to test your students!</p>
                        </td>
                    </tr>";;
            }
            ?>
        </tbody>
    </table>
</main>

<script src="index.js"></script>