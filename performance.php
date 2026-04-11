<?php 
include 'db_connect.php'; 
include 'header.php'; 
?>

<main>
    <div class="search-container">
        <input type="search" placeholder="Search by name, course, or assessment..." id="search">
    </div>

    <div class="info-container">
        <h2>Performance and Progress</h2>
    </div>

    <div id="btn-container">
        <a href="add_performance.php"><button>Add New Record</button></a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Course Name</th>
                <th>Instructor</th>
                <th>Assessment Name</th>
                <th>Received Grade</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT s.SubmissionID, st.StudentID, p.FirstName, p.LastName, c.CourseName, 
                           prof.FirstName AS InstFirst, prof.LastName AS InstLast, 
                           a.AssessmentName, s.ReceivedGrade 
                    FROM submission s
                    JOIN student st ON s.StudentID = st.StudentID
                    JOIN profile p ON st.UserID = p.UserID
                    JOIN assessment a ON s.AssessmentID = a.AssessmentID
                    JOIN course c ON a.CourseID = c.CourseID
                    LEFT JOIN instructor i ON c.InstructorID = i.InstructorID
                    LEFT JOIN profile prof ON i.UserID = prof.UserID";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $fullName = $row['FirstName'] . " " . $row['LastName'];
                    $instName = $row['InstFirst'] ? $row['InstFirst'] . " " . $row['InstLast'] : "TBA";
                    echo "<tr>
                            <td>{$row['StudentID']}</td>
                            <td>{$fullName}</td>
                            <td>{$row['CourseName']}</td>
                            <td>{$instName}</td>
                            <td>{$row['AssessmentName']}</td>
                            <td>{$row['ReceivedGrade']}</td>
                            <td>
                                <a href='edit_performance.php?id={$row['SubmissionID']}'><button style='background:#e8f4fd; color:#3498db;'>Edit</button></a>
                                <a href='delete_performance.php?id={$row['SubmissionID']}' onclick='return confirm(\"Delete this record?\")'><button style='background:#ffeded; color:#e74c3c;'>Delete</button></a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='7' style='text-align:center; padding: 40px; color: #7f8c8d;'>
                            <div style='font-size: 1.2rem; margin-bottom: 10px;'>💯 No Performance Record Found.</div>
                            <p>It looks like there's nothing here yet.</p>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="chart-container" style="width: 80%; margin: 20px auto;">
        <canvas id="gradeChart"></canvas>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="index.js"></script>
</body>
</html>