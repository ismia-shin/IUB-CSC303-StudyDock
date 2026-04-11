<?php
include 'db_connect.php';
include 'header.php';
?>

<main>
    <div class="search-container">
        <input type="search" placeholder="Search enrollments..." id="search">
    </div>

    <div class="info-container">
        <h2>Enrollment Management</h2>
    </div>

    <div id="btn-container">
        <a href="add_enrollment.php"><button>Add New Enrollment</button></a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Enrollment ID</th>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Instructor</th> <th>Enrollment Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT e.EnrollmentID, e.EnrollmentDate, 
                           sp.FirstName AS sFirst, sp.LastName AS sLast, 
                           c.CourseName, 
                           ip.FirstName AS iFirst, ip.LastName AS iLast
                    FROM enrollment e
                    JOIN student s ON e.StudentID = s.StudentID
                    JOIN profile sp ON s.UserID = sp.UserID
                    JOIN course c ON e.CourseID = c.CourseID
                    LEFT JOIN instructor i ON c.InstructorID = i.InstructorID
                    LEFT JOIN profile ip ON i.UserID = ip.UserID
                    ORDER BY e.EnrollmentDate DESC";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $studentFull = htmlspecialchars($row['sFirst'] . " " . $row['sLast']);
                    $instructorFull = ($row['iFirst']) ? htmlspecialchars($row['iFirst'] . " " . $row['iLast']) : "Not Assigned";

                    echo "<tr>";
                    echo "<td>" . $row['EnrollmentID'] . "</td>";
                    echo "<td>" . $studentFull . "</td>";
                    echo "<td>" . htmlspecialchars($row['CourseName']) . "</td>";
                    echo "<td>" . $instructorFull . "</td>"; 
                    echo "<td>" . $row['EnrollmentDate'] . "</td>";
                    echo "<td>
                            <a href='edit_enrollment.php?id=" . $row['EnrollmentID'] . "'><button>Edit</button></a>
                            <a href='delete_enrollment.php?id=" . $row['EnrollmentID'] . "' onclick=\"return confirm('Cancel this enrollment?');\"><button>Delete</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='6' style='text-align:center; padding: 40px; color: #7f8c8d;'>
                            <div style='font-size: 1.2rem; margin-bottom: 10px;'>📝 No enrollments found.</div>
                            <p>Start by enrolling a student into a course!</p>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<script src="index.js"></script>