<?php 
include 'db_connect.php'; 
include 'header.php'; 
?>

<main>
    <div class="search-container">
        <input type="search" placeholder="Search for Student..." id="search">
    </div>

    <div class="info-container">
        <h2>Student Profile</h2>
    </div>

    <div id="btn-container">
        <a href="add_student.php"><button>Add new</button></a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Major</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT s.StudentID, p.FirstName, p.LastName, p.Phone, s.Major, 
                           CONCAT(s.Street, ', ', s.City, ', ', s.Country) AS Address 
                    FROM student s 
                    JOIN profile p ON s.UserID = p.UserID";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['StudentID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Phone'] ?? 'N/A') . "</td>";
                    echo "<td>" . htmlspecialchars($row['Major'] ?? 'Undecided') . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>
                            <a href='delete_student.php?id=" . $row['StudentID'] . "' onclick=\"return confirm('Delete this student permanently?');\"><button>Delete</button></a>
                            <a href='edit_student.php?id=" . $row['StudentID'] . "'><button>Edit</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='7' style='text-align:center; padding: 40px; color: #7f8c8d;'>
                            <div style='font-size: 1.2rem; margin-bottom: 10px;'>🎓 No Student found.</div>
                            <p>It looks like there's nothing here yet. Try learning something new!</p>
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