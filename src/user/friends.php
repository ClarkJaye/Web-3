<?php include_once('user-header.php') ?>


<section class="home-grid" id="">

   <h1 class="heading">Friends</h1>

   <div class="main">
      <div class="cards">
         <div class="card">
            <div class="card-content">
               <div class="number">1217</div>
               <div class="card-name">Total Friends</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-users"></i>
            </div>
         </div>

         <div class="card">
            <div class="card-content">
               <!-- <div class="number">68</div> -->
               <div class="number"><button class="view-ann" id='addFrndBtn'>Add</button></div>
               <div class="card-name">Invite Friends</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-users"></i>
            </div>
         </div>

         <div class="card">
            <div class="card-content">
               <!-- <div class="number">68</div> -->
               <div class="number"><button class="view-ann" id='viewFrndBtn'>view</button></div>
               <div class="card-name">Accept Friends</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-users"></i>
            </div>
         </div>
      </div>
      <style>
         .view-ann {
            padding: 5px 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            background: var(--main-color);
            color: var(--white);
            cursor: pointer;
            font-size: 18px;
         }

         .view-ann:hover {
            background: var(--hover);

         }

         #ann::after {
            content: "0";
            color: var(--white);
            position: absolute;
            top: -20px;
            right: -10px;
            font-size: 1rem;
            font-weight: 600;
            background-color: #3b3abe;
            background-clip: padding-box;
            border-radius: 50%;
            padding: 10px;
         }
      </style>

      <!-- <div class="charts">
         <div class="chart">
            <h2>Activities</h2>
            <div>
               <canvas id="lineChart"></canvas>
            </div>
         </div>

         <div class="chart doughnut-chart">
            <h2>Friends</h2>
            <?php if (empty($myfriends)) { ?>
               <p>No friends added yet.</p>
            <?php } else { ?>
               <?php foreach ($myfriends as $friend) { ?>
                  <div class="friend-card" style='border: 1px solid #ccccccba;'>
                     <div class="friend-info">
                        <img src="<?php echo "../../User_img/" . $friend['profile_img']; ?>" alt="Friend Profile Picture">
                        <div class="friend-details">
                           <h3 style='color: var(--black)'>
                              <?php echo $friend['firstName']; ?>
                           </h3>
                        </div>
                     </div>
                     <button class="add-friend-button unfriendFriendBtn" id='<?php echo $friend['userID'] ?>'>
                        Friend
                     </button>
                  </div>
               <?php } ?>
            <?php } ?>
         </div>
      </div> -->
      <!-- </div> -->


      <div class="card-table">
         <div class="row">
            <h2>List of Friends</h2>
            <div class="table-container">
               <table id='activityTable'>
                  <thead>
                     <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Profile Image</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (!empty($friends)) {
                        foreach ($friends as $user) { ?>
                           <tr>
                              <td>
                                 <?php echo $user['userID'] ?>
                              </td>
                              <td>
                                 <?php echo $user['firstName'] ?>
                              </td>
                              <td>
                                 <?php echo $user['lastName'] ?>
                              </td>
                              <td>
                                 <?php echo $user['gender'] ?>
                              </td>
                              <td>
                                 <?php echo $user['address'] ?>
                              </td>
                              <td>
                                 <?php echo $user['email'] ?>
                              </td>
                              <td>
                                 <div style='width:150px; height:150px; margin:auto;'>
                                    <img src="<?php echo "../../User_img/" . $user['profile_img'] ?>" alt="Activity Image"
                                       style="width: 100%; height:100%; object-fit:cover; border-radius: 50%;">
                                 </div>
                              </td>

                              <style>
                                 .message-success {
                                    background-color: #28a745 !important;
                                    border-color: #28a745 !important;
                                 }

                                 .message-success:hover {
                                    background-color: #239d3f !important;
                                    border-color: #1f9139 !important;
                                 }
                              </style>

                           </tr>
                        <?php }
                     } else { ?>
                        <tr>
                           <td colspan="10">
                              <div id="errorMessage" class="statusMessage error" style="margin-bottom: 1.5rem;">No User
                                 Added Yet!.</div>
                           </td>
                        </tr>
                     <?php } ?>



                  </tbody>
               </table>
            </div>
         </div>
      </div>


   </div>



</section>

<style>
   .friend-cont {
      border-radius: 1rem;
      padding: 10px;
      height: 400px;
      overflow: auto;
   }

   .friend-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 10px;
   }

   .friend-info {
      display: flex;
      align-items: center;
   }

   .friend-info img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
   }

   .friend-details {
      font-size: 16px;
   }

   .friend-details h3 {
      margin: 0;
      font-weight: bold;
   }

   .friend-details p {
      margin: 0;
      color: #888;
   }

   .add-friend-button {
      background-color: #0171d3;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
   }

   .req-sent-button {
      background-color: #80878d;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
   }

   .req-sent {
      background: #80878d !important;
   }

   .add-friend-button:hover {
      background-color: #0278e0;
   }

   .friend-cont form {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
   }

   .friend-cont form input {
      margin-right: 10px;
   }

   .friend-cont form button {
      margin-top: 0;
   }
</style>
<!-- Modal -->


<!-- view Friends -->
<div id="viewFriendsModal" class="modal" style="overflow:auto;">
   <div class="modal-content" style="margin:8% auto;max-width:600px">
      <span class="close" onclick="closeModal()">&times;</span>
      <header>Accept Friends</header>

      <div id="errorMessage" class="statusMessage d-none"></div>

      <div class="friend-cont">

         <!-- Display Search Results -->
         <div id="accfriendCont">
            <?php foreach ($friends as $friend) { ?>
               <div class="friend-card">
                  <div class="friend-info">
                     <img src="<?php echo "../../User_img/" . $friend['profile_img']; ?>" alt="Friend Profile Picture">
                     <div class="friend-details">
                        <h3>
                           <?php echo $friend['firstName']; ?>
                        </h3>
                        <!-- <p><?php echo $friend['description']; ?></p> -->
                     </div>
                  </div>
                  <?php foreach ($myfriends as $mfriend) { ?>
                     <?php if ($friend['status'] != 'accepted') { ?>
                        <button class="add-friend-button acceptFriendBtn" id='<?php echo $mfriend['userID'] ?>'>
                           Accept Friend
                        </button>
                     <?php } else { ?>
                        <button class="add-friend-button unfriendFriendBtn" id='<?php echo $mfriend['userID'] ?>'>
                           accepted
                        </button>
                     <?php } ?>
                  <?php } ?>
               </div>
            <?php } ?>
         </div>

      </div>

   </div>
</div>

<!-- ADD Friends -->
<div id="addFriendsModal" class="modal" style="overflow:auto;">
   <div class="modal-content" style="margin:8% auto;max-width:600px">
      <span class="close" onclick="closeModal()">&times;</span>
      <header>Add Friends</header>

      <div id="errorMessage" class="statusMessage d-none"></div>

      <div class="friend-cont">
         <!-- Friend Search Form -->
         <form method="POST" action="">
            <input type="text" name="search" placeholder="Search for friends">
            <button type="submit">Search</button>
         </form>
         <!-- Display Search Results -->
         <div id="friendCont">
            <?php foreach ($users as $user) { ?>
               <div class="friend-card">
                  <div class="friend-info">
                     <img src="<?php echo "../../User_img/" . $user['profile_img']; ?>" alt="Friend Profile Picture">
                     <div class="friend-details">
                        <h3>
                           <?php echo $user['firstName']; ?>
                        </h3>
                        <!-- <p><?php echo $user['description']; ?></p> -->
                     </div>
                  </div>
                  <?php
                  // Check if friend request already sent
                  $senderId = $_SESSION['userID'];
                  $receiverId = $user['userID'];
                  $sqlCheckRequest = "SELECT * FROM friend_requests WHERE sender_id = '$senderId' AND receiver_id = '$receiverId'";
                  $resultCheckRequest = $con->query($sqlCheckRequest);

                  if ($resultCheckRequest->num_rows > 0) {
                     // Display "Request Sent" button
                     echo '<button class="req-sent-button">Request Sent</button>';
                  } else {
                     // Display "Add Friend" button
                     echo '<button class="add-friend-button addFriendBtn" id="' . $user['userID'] . '">Add Friend</button>';
                  }
                  ?>
               </div>
            <?php } ?>
         </div>

      </div>

   </div>
</div>


<script>

   // Add Friend
   $(document).on('click', '.addFriendBtn', function (e) {
      e.preventDefault();

      var act_id = $(this).attr('id');
      // alert(act_id)
      $.ajax({
         type: "POST",
         url: "../communicate.php",
         data: { friendId: act_id },
         success: function (response) {
            var res = JSON.parse(response);
            console.log(res)
            if (res.status == 200) {
               alert(res.message);
               $('#friendCont').load(location.href + " #friendCont");

            }
            else if (res.status == 500) {
               alert(res.message);
               // $('#activityTable').load(location.href + " #activityTable");
            }
         }
      })

   })

   // Accept Friend
   $(document).on('click', '.acceptFriendBtn', function (e) {
      e.preventDefault();

      var act_id = $(this).attr('id');
      // alert(act_id)
      $.ajax({
         type: "POST",
         url: "../communicate.php",
         data: { friendRequestId: act_id },
         success: function (response) {
            var res = JSON.parse(response);
            console.log(response)
            if (res.status == 200) {
               alert(res.message);
               $('#accfriendCont').load(location.href + " #accfriendCont");

            } else if (res.status == 404) {
               alert(res.message);
               $('#accfriendCont').load(location.href + " #accfriendCont");

            }
            else if (res.status == 500) {
               alert(res.message);
               // $('#activityTable').load(location.href + " #activityTable");
            }
         }
      })

   })


</script>

<?php include_once('user-footer.php') ?>