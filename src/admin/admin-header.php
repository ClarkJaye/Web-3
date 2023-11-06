<?php
session_start();

include_once('../../Included/dbconnect/connection.php');
$con = connection();

$userId = $_SESSION['userID'];

// My Account
$query = "SELECT * FROM user where `userID` = '$userId'";
$result = $con->query($query);
if ($result->num_rows == 1) {
   $myAcc = $result->fetch_assoc();
}

// Authorized
if ($_SESSION["Role"] == null) {
   header("Location: ../../landing.php");
   exit;
} else {
   if ($_SESSION["Role"] == "admin") {
   } else if ($_SESSION["Role"] == "user") {
      header("Location: user/dashboard.php");
   }
}

// Show List User
$query = "SELECT * FROM user where `role` = 'user'";
$result = $con->query($query);

// Stored in Array
$users = [];
$activatedUser = 0;
$deactivatedUser = 0;
while ($rowData = $result->fetch_assoc()) {
   $users[] = $rowData;

   // For Counting the Active User
   if ($rowData['status'] == 'active') {
      $activatedUser++;
   }

   // For Counting the De-acActive User
   if ($rowData['status'] == 'deactive') {
      $deactivatedUser++;
   }

}
// Count Total Users
$totalUser = count($users);




// Show Activity in dashboard
$sqlActivity = "SELECT activities.*, CONCAT(user.firstName, ' ', user.lastName) AS creator_name
                FROM activities
                JOIN user ON activities.userID = user.userID";
$resultActivity = $con->query($sqlActivity);

// Fetch all activity rows into an array
$activities = [];
$upcomingActivities = 0;
$doneActivities = 0;
while ($rowData = $resultActivity->fetch_assoc()) {
   $activities[] = $rowData;

   if ($rowData['status'] == 'done') {
      $doneActivities++;
   } else if ($rowData['status'] == 'upcoming') {
      $upcomingActivities++;
   }
}
// Count Total Activities
$totalActivities = count($activities);



// Announcement
$sqlAnnounce = "SELECT announcements.*, user.firstName AS creator_name
                FROM announcements
                JOIN user ON announcements.admin_id = user.userID
                ORDER BY created_at DESC";
$resultAnnounce = $con->query($sqlAnnounce);

$announcements = [];
while ($rowData = $resultAnnounce->fetch_assoc()) {
   $announcements[] = $rowData;
}
// Count Total Announcement
$totalAnnouncements = count($announcements);



// Graphs
$sql = "SELECT gender, COUNT(*) AS count FROM user GROUP BY gender";
$result = $con->query($sql);
$genderData = array();
if ($result->num_rows > 0) {
   while ($rowGender = $result->fetch_assoc()) {
      $genderData[$rowGender['gender']] = $rowGender['count'];
   }
} else {
   echo "No User data found.";
}
// Bar Chart
$query = "SELECT MONTH(STR_TO_DATE(dateOfActivity, '%m/%d/%Y')) AS month, COUNT(*) AS count FROM activities GROUP BY MONTH(STR_TO_DATE(dateOfActivity, '%m/%d/%Y'))";
$result = $con->query($query);
$activityData = array_fill(0, 12, 0);
if ($result->num_rows > 0) {
   while ($rowActivity = $result->fetch_assoc()) {
      $month = $rowActivity['month'];
      $count = $rowActivity['count'];
      $monthIndex = $month - 1;
      $activityData[$monthIndex] = (int) $count;
   }
} else {
   echo "No activity data found.";
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard - Admin </title>

   <!-- font awesome cdn link  -->
   <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../assets/css/admin_user.css">
   <link rel="stylesheet" href="../../assets/css/modal.css">

   <!-- AJAX -->
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

   <!-- Charts -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body>

   <!-- Header -->
   <header class="header">

      <section class="flex">

         <a href="../../landing.html" class="logo">ActivityHub </a>

         <form action="search.html" method="post" class="search-form">
            <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
            <button type="submit" class="fas fa-search"></button>
         </form>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
         </div>

         <div class="profile">
            <img src="../../assets/img/admin/user.jpg" class="image" alt="">
            <h3 class="name">
               <?php echo $myAcc['firstName'] . ' ' . $myAcc['lastName'] ?>
            </h3>
            <p class="role">
               <?php echo $myAcc['role'] ?>
            </p>
            <a href="profile.html" class="btn">view profile</a>
            <div class="flex-btn">
               <a href="../logout.php" class="option-btn">logout</a>
               <a href="" class="option-btn">cancel</a>
            </div>
         </div>

      </section>

   </header>

   <style>
      .role {
         font-size: 16px;
         color: #888;
         font-weight: 600;
      }
   </style>

   <div class="side-bar">

      <div id="close-btn">
         <i class="fas fa-times"></i>
      </div>

      <div class="profile">
         <img src="../../assets/img/admin/user.jpg" class="image" alt="">
         <h3 class="name">
            <?php echo $myAcc['firstName'] . ' ' . $myAcc['lastName'] ?>
         </h3>
         <p class="role">Admin</p>
         <a href="profile.html" class="btn">view profile</a>
      </div>

      <nav class="navbar">
         <a href="dashboard.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
         <a href="list-users.php"><i class="fas fa-user"></i><span>Users</span></a>
         <a href="list-activities.php"><i class="fas fa-list"></i><span>Activities</span></a>
         <a href="announcement.php"><i class="fas fa-chalkboard-user"></i><span>Announcement</span></a>
         <a href=""><i class="fas fa-gear"></i><span>Settings</span></a>
      </nav>

   </div>