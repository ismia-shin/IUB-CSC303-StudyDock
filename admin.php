<?php
include 'db_connect.php';
include 'header.php';
?>

<main>

    <!-- ================= STUDENT ================= -->
    <div class="info-container"><h2>Student Management</h2></div>

    <div class="search-container">
        <input type="text" id="searchStudent" placeholder="🔍 Search Students...">
    </div>

    <div id="btn-container">
        <a href="add_admin_student.php"><button>Add New Student</button></a>
    </div>

    <table class="table" id="studentTable">
        <thead>
            <tr>
                <th>UserID</th><th>StudentID</th><th>Name</th><th>Phone</th>
                <th>DOB</th><th>Major</th><th>Street</th><th>City</th>
                <th>Country</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $res = $conn->query("SELECT p.UserID, s.StudentID, p.FirstName, p.LastName, p.Phone, s.DateOfBirth, s.Major, s.Street, s.City, s.Country FROM profile p JOIN student s ON p.UserID = s.UserID");

        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['UserID']}</td>
                    <td>{$row['StudentID']}</td>
                    <td>{$row['FirstName']} {$row['LastName']}</td>
                    <td>{$row['Phone']}</td>
                    <td>{$row['DateOfBirth']}</td>
                    <td>{$row['Major']}</td>
                    <td>{$row['Street']}</td>
                    <td>{$row['City']}</td>
                    <td>{$row['Country']}</td>
                    <td>
                        <a href='edit_admin_user.php?role=Student&id={$row['StudentID']}'><button>Edit</button></a> 
                        <a href='delete_admin_user.php?role=Student&uid={$row['UserID']}' onclick='return confirm(\"Delete student?\")'><button>Delete</button></a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='10' style='text-align:center;'>No students found</td></tr>";
        }
        ?>
        </tbody>
    </table>


    <!-- ================= INSTRUCTOR ================= -->
    <div class="info-container"><h2>Instructor Management</h2></div>

    <div class="search-container">
        <input type="text" id="searchInstructor" placeholder="🔍 Search Instructors...">
    </div>

    <div id="btn-container">
        <a href="add_admin_instructor.php"><button>Add New Instructor</button></a>
    </div>

    <table class="table" id="instructorTable">
        <thead>
            <tr>
                <th>UserID</th><th>InstructorID</th><th>Name</th><th>Phone</th>
                <th>Dept</th><th>University</th><th>Degree</th><th>Subject</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $res = $conn->query("SELECT p.UserID, i.InstructorID, p.FirstName, p.LastName, p.Phone, i.Department, i.University, i.Degree, i.Subject FROM profile p JOIN instructor i ON p.UserID = i.UserID");

        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['UserID']}</td>
                    <td>{$row['InstructorID']}</td>
                    <td>{$row['FirstName']} {$row['LastName']}</td>
                    <td>{$row['Phone']}</td>
                    <td>{$row['Department']}</td>
                    <td>{$row['University']}</td>
                    <td>{$row['Degree']}</td>
                    <td>{$row['Subject']}</td>
                    <td>
                        <a href='edit_admin_user.php?role=Instructor&id={$row['InstructorID']}'><button>Edit</button></a> 
                        <a href='delete_admin_user.php?role=Instructor&uid={$row['UserID']}' onclick='return confirm(\"Delete instructor?\")'><button>Delete</button></a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='9' style='text-align:center;'>No instructors found</td></tr>";
        }
        ?>
        </tbody>
    </table>


    <!-- ================= COMMITTEE ================= -->
    <div class="info-container"><h2>Committee Management</h2></div>

    <div class="search-container">
        <input type="text" id="searchCommittee" placeholder="🔍 Search Committee...">
    </div>

    <div id="btn-container">
        <a href="add_admin_committee.php"><button>Add New Member</button></a>
    </div>

    <table class="table" id="committeeTable">
        <thead>
            <tr>
                <th>UserID</th><th>CommitteeID</th><th>Name</th>
                <th>Phone</th><th>Specialization</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $res = $conn->query("SELECT p.UserID, c.CommitteeID, p.FirstName, p.LastName, p.Phone, c.Specialization FROM profile p JOIN committee c ON p.UserID = c.UserID");

        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['UserID']}</td>
                    <td>{$row['CommitteeID']}</td>
                    <td>{$row['FirstName']} {$row['LastName']}</td>
                    <td>{$row['Phone']}</td>
                    <td>{$row['Specialization']}</td>
                    <td>
                        <a href='edit_admin_user.php?role=Committee&id={$row['CommitteeID']}'><button>Edit</button></a> 
                        <a href='delete_admin_user.php?role=Committee&uid={$row['UserID']}' onclick='return confirm(\"Delete member?\")'><button>Delete</button></a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>No committee found</td></tr>";
        }
        ?>
        </tbody>
    </table>

</main>

<script src="index.js"></script>