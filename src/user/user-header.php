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
   if ($_SESSION["Role"] == "user") {
      // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
      //    $search = $_POST["search"];

      //    // Search for users based on the search criteria
      //    $sqlSearch = "SELECT * FROM user WHERE role = 'user'";
      //    // $sqlSearch = "SELECT * FROM user WHERE role = 'user' AND firstName LIKE '%$search%'";
      //    $resultSearch = $con->query($sqlSearch);

      //    $users = [];
      //    while ($rowData = $resultSearch->fetch_assoc()) {
      //       $users[] = $rowData;
      //    }
      // }



   } else if ($_SESSION["Role"] == "admin") {
      header("Location: admin/dashboard.php");
      exit;
   }
}


// Show Activity in dashboard
$sqlActivity = "SELECT * FROM activities WHERE userID = '" . $_SESSION['userID'] . "' ORDER BY `dateOfActivity` DESC ";
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
$sqlAnnounce = "SELECT * FROM announcements ORDER BY `created_at` Desc ";
$resultAnnounce = $con->query($sqlAnnounce);

$announcements = [];
while ($rowData = $resultAnnounce->fetch_assoc()) {
   $announcements[] = $rowData;
}
// Count Total Announcement
$totalAnnouncements = count($announcements);


// Collect User
$sqlSearch = "SELECT * FROM user WHERE role = 'user' AND userID != $userId ";
$resultSearch = $con->query($sqlSearch);

$users = [];
while ($rowData = $resultSearch->fetch_assoc()) {
   $users[] = $rowData;
}

// Collect User
$sqlAnnounce = "SELECT friend_requests.*, user.*, friend_requests.status AS friend_status
                FROM friend_requests
                JOIN user ON friend_requests.sender_id = user.userID
                WHERE friend_requests.receiver_id = $userId";

$resultSearch = $con->query($sqlAnnounce);

$friends = [];
while ($rowData = $resultSearch->fetch_assoc()) {
   $friends[] = $rowData;

}
$sqlfriends = "SELECT friends.*, user.*
                FROM friends
                JOIN user ON (friends.user1_id = user.userID OR friends.user2_id = user.userID)
                WHERE ((friends.user1_id = $userId AND friends.user2_id <> $userId) OR (friends.user2_id = $userId AND friends.user1_id <> $userId))
                  AND friends.status = 'accepted'";

$resultSearch = $con->query($sqlfriends);

$myfriends = [];
while ($rowData = $resultSearch->fetch_assoc()) {
   $myfriends[] = $rowData;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ActivityHub - user </title>

   <!-- font awesome cdn link  -->
   <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../assets/css/admin_user.css">
   <link rel="stylesheet" href="../../assets/css/modal.css">

   <!-- AJAX -->
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



</head>

<body>

   <!-- Header -->
   <header class="header">

      <section class="flex">

         <a href="../../landing.html" class="logo">ActivityHub</a>

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
   <div class="side-bar">

      <div id="close-btn">
         <i class="fas fa-times"></i>
      </div>

      <div class="profile">
         <img src="../../assets/img/admin/user.jpg" class="image" alt="">
         <h3 class="name">
            <?php echo $myAcc['firstName'] . ' ' . $myAcc['lastName'] ?>
         </h3>
         <p class="role2">
            <?php echo $myAcc['role'] ?>
         </p>
         <!-- <a href="profile.html" class="btn">view profile</a> -->
      </div>

      <nav class="navbar">
         <a href="dashboard.php"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
         <a href="home.php"><i class="fas fa-home"></i><span>Home</span></a>
         <a href="activities.php"><i class="fas fa-list"></i><span>Activities</span></a>
         <a href="friends.php"><i class="fas fa-users"></i><span>Friends</span></a>
         <a href=""><i class="fas fa-gear"></i><span>Settings</span></a>
      </nav>
      <div class="btn-cont">
         <button class='btn full-side' id='full-sidebarBtn'>
            <i class="fas fa-arrow-right"></i>
         </button>
      </div>
      <div class="btn-cont">
         <button class='btn full-side' id='hide-sidebarBtn' style='display:none;'>
            <i class="fas fa-arrow-left"></i>
         </button>
      </div>
   </div>

   <script>
      const sideBtn = document.getElementById('full-sidebarBtn');
      const hideBtn = document.getElementById('hide-sidebarBtn');
      const sidebar = document.querySelector('.side-bar');
      const wholeMain = document.querySelector('body');
      const profileImg = document.querySelector('.side-bar .profile .image');
      const profileSide = document.querySelector('.side-bar .profile');
      const navbar_a = document.querySelectorAll('.side-bar .navbar a');
      const navbar_ai = document.querySelectorAll('.side-bar .navbar a i');
      const detailsSpan = document.querySelectorAll('.side-bar .navbar a span');
      const details = document.querySelectorAll('.side-bar .name2, .role2');

      sideBtn.addEventListener('click', () => {
         sideBtn.style.display = 'none';
         sidebar.style.width = '30rem';
         wholeMain.style.paddingLeft = '30rem';
         profileSide.style.padding = '3rem 2rem';

         navbar_a.forEach(a => {
            a.style.textAlign = 'none';
            a.style.display = 'flex';
            a.style.alignItems = 'center';
            a.style.padding = '2rem 4rem';
         });

         navbar_ai.forEach(ai => {
            ai.style.fontSize = '2.5rem';
         });
         details.forEach(detail => {
            detail.style.display = 'block';
         });
         detailsSpan.forEach(detail => {
            detail.style.display = 'block';
            detail.style.marginLeft = '10px';
         });

         hideBtn.style.display = 'block';

      })

      hideBtn.addEventListener('click', () => {
         hideBtn.style.display = 'none';
         sidebar.style.width = '12rem';
         wholeMain.style.paddingLeft = '12rem';

         profileSide.style.padding = '3rem 0';
         profileImg.style.height = '8rem';
         profileImg.style.width = '8rem';


         navbar_a.forEach(a => {
            a.style.textAlign = 'center';
            a.style.display = 'block';
            a.style.padding = '2rem';
            a.style.fontsize = '2rem';

         });

         navbar_ai.forEach(ai => {
            ai.style.fontSize = '30px';
         });

         details.forEach(detail => {
            detail.style.display = 'none';
         });
         detailsSpan.forEach(detail => {
            detail.style.display = 'none';
            detail.style.marginLeft = 'initial';
         });

         sideBtn.style.display = 'flex';
      });

   </script>

   <style>
      .btn-cont {
         padding: 5px 2rem;
         display: flex;
         align-items: center;
         justify-content: center;
      }

      .full-side {
         width: 15rem;
      }

      body {
         padding-left: 12rem;
      }

      @media (max-width: 1200px) {
         body {
            padding-left: 0;
         }
      }

      .side-bar {
         width: 12rem;
         overflow: auto
      }

      /* .side-bar::-webkit-scrollbar {
         width: 5px;
         height: 5px;
      }

      .side-bar::-webkit-scrollbar-track {
         background-color: #dfdede;
      }

      .side-bar::-webkit-scrollbar-thumb {
         background-color: #df4adf;
         border-radius: 5px;
      } */

      .side-bar .profile .image {
         height: 8rem;
         width: 8rem;
      }

      .side-bar .profile {
         padding: 3rem 0;
      }

      .side-bar .navbar a {
         text-align: center;
      }

      .side-bar .navbar a i {
         margin-right: 0;
         font-size: 30px;
      }

      .side-bar .navbar a span,
      .name2,
      .role2 {
         display: none;
      }
   </style>