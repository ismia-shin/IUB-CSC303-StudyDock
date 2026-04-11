<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Study Dock</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="Asset\study_dock.png">
    <style>
        /* Form styling to match your existing Study Dock theme */
        .form-container {
            max-width: 600px; margin: 20px auto; padding: 30px;
            background: #fff; border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 8px; color: #2c3e50; }
        .form-group input { 
            width: 100%; padding: 12px; border: 2px solid #e0e0e0; 
            border-radius: 8px; box-sizing: border-box; transition: border-color 0.3s;
        }
        .form-group input:focus { border-color: #14abd0; outline: none; }
        .submit-btn {
            background: linear-gradient(135deg, #14abd0, #4e63dd);
            color: white; border: none; padding: 12px 25px;
            border-radius: 20px; cursor: pointer; width: 100%;
            font-weight: bold; font-size: 1rem; transition: transform 0.2s;
        }
        .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(20, 171, 208, 0.4); }
    </style>
</head>
<body>
<header>
    <div id="logo-container">
        <span id="logo">
            <img src="Asset\study_dock.png" height="40" alt="Logo">
            <h1>Study Dock</h1>
        </span>
    </div>

    <nav class="main-nav">
        <?php 
            $currentPage = basename($_SERVER['PHP_SELF']); 
        ?>
        <ul>
            <li><a href="home.html" class="<?= ($currentPage == 'home.html') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="profile.php" class="<?= (in_array($currentPage, ['profile.php', 'add_student.php', 'edit_student.php'])) ? 'active' : ''; ?>">Profile</a></li>
            <li><a href="course.php" class="<?= ($currentPage == 'course.php') ? 'active' : ''; ?>">Courses</a></li>
            <li><a href="content.php" class="<?= ($currentPage == 'content.php') ? 'active' : ''; ?>">Content</a></li>
            <li><a href="enroll.php" class="<?= ($currentPage == 'enroll.php') ? 'active' : ''; ?>">Enrollment</a></li>
            <li><a href="performance.php" class="<?= ($currentPage == 'performance.php') ? 'active' : ''; ?>">Performance</a></li>
            <li><a href="assesment.php" class="<?= ($currentPage == 'assesment.php') ? 'active' : ''; ?>">Assessment</a></li>
            <li><a href="admin.php" class="<?= ($currentPage == 'admin.php') ? 'active' : ''; ?>">Admin</a></li>
            <li><a href="about.html" class="<?= ($currentPage == 'about.html') ? 'active' : ''; ?>">About Us</a></li>
        </ul>
    </nav>
</header>