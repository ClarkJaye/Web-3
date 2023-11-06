<?php include_once('user-header.php') ?>


<section class="home-grid" id="">

   <h1 class="heading">Dashboard</h1>

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
               <div class="number" style='display:flex; align-items:center;'>
                  <h3 class='number'>
                     <?php echo $totalActivities ?>
                  </h3><button class="view-ann" style='margin-bottom:0; margin-left:15px;'><a href="activities.php"
                        style='color:var(--white);'>Add</a></button>
               </div>
               <div class="card-name">Total Activities</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-list"></i>
            </div>
         </div>
         <div class="card">
            <div class="card-content">
               <!-- <div class="number">68</div> -->
               <div class="number"><button class="view-ann">Invite</button></div>
               <div class="card-name">Invite Friends</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-users"></i>
            </div>
         </div>
         <div class="card">
            <div class="card-content">
               <div class="number"><button class="view-ann" id='viewAnnounceBtn'>View</button></div>
               <div class="card-name">Announcement</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-message " id="ann" style="position: relative;"></i>
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


         table {
            width: 100%;
            border: 1px solid var(--black);
            border-collapse: collapse;
            vertical-align: middle;
            text-align: center;
            font-size: 14px;
            color: var(--black)
         }

         thead {
            background: #893cab;
            color: white;
         }

         th,
         td {
            padding: 10px;
            border: 1px solid #888;
         }

         .setTableActivity {
            height: 400px;
            overflow: auto;
         }

         .table-container {
            height: 500px;
            overflow: auto;
         }

         table p {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
         }
      </style>


      <div class="charts">
         <div class="chart">
            <h2>Activities</h2>
            <div class="table-container">
               <table id='activityTable'>
                  <thead>
                     <tr>
                        <th>Activity Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>OOTD</th>
                        <th>Remarks</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (!empty($activities)) {
                        $doneActivities = [];
                        $upcomingActivities = [];

                        foreach ($activities as $activity) {
                           if ($activity['status'] == 'done') {
                              $doneActivities[] = $activity;
                           } else if ($activity['status'] == 'upcoming') {
                              $upcomingActivities[] = $activity;
                           }
                        }

                        $sortedActivities = array_merge($doneActivities, $upcomingActivities);

                        foreach ($sortedActivities as $activity) { ?>
                           <tr>
                              <td>
                                 <?php echo $activity['activityName']; ?>
                              </td>
                              <td>
                                 <?php echo $activity['location']; ?>
                              </td>
                              <td>
                                 <?php echo $activity['dateOfActivity']; ?>
                              </td>
                              <td>
                                 <?php echo $activity['timeOfActivity']; ?>
                              </td>
                              <td>
                                 <img src="<?php echo "../../activity_savedpictures/" . $activity['image']; ?>"
                                    alt="Activity Image"
                                    style="width: 150px; height:100px; object-fit:cover; border-radius: 5px;">
                              </td>
                              <td>
                                 <?php if ($activity['status'] == 'done') {
                                    echo $activity['remarks'];
                                 } else { ?>
                                    <p>Not Yet Set</p>
                                 <?php } ?>
                              </td>
                           
                           </tr>
                        <?php }
                     } else { ?>
                        <tr>
                           <td colspan="8">
                              <div id="errorMessage" class="statusMessage error" style="margin-bottom: 1.5rem;">No Activity
                                 Added Yet!.</div>
                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>



         <!-- Friends -->
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
      </div>
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

   </div>


</section>


<!-- Modal -->

<!-- View Announcement -->
<div id="announcementModal" class="modal" style="overflow:auto;display:;">
   <div class="modal-content" style="margin:8% auto;max-width:800px; background-color: var(--white);">
      <span class="close" onclick="closeModal()">&times;</span>
      <h1 class="heading" style='text-align:center;'>Announcement</h1>


      <!-- Announcement -->
      <section class="announce" id='announceSection'>



         <div class="box-container">
            <?php if (!empty($announcements)) {
               foreach ($announcements as $announce) { ?>
                  <div class="box" style='box-shadow: 0 7px 25px rgba(0, 0, 0, 0.3);'>
                     <div class="tutor">
                        <img src="../../User_img/pic-2.jpg" alt="">
                        <div class="info">
                           <h3>john </h3>
                           <span>
                              <?php echo date("m/d/Y h:i A", strtotime($announce['created_at'])); ?>
                           </span>
                        </div>
                     </div>
                     <div class="tutor">
                        <h3>Title :</h3>
                        <span style='font-size:17px'>
                           <?php echo $announce['title'] ?>
                        </span>
                     </div>
                     <div class="tutor-content">
                        <p>
                           <?php echo $announce['content'] ?>
                        </p>
                     </div>

                     <a href="#" class="inline-btn" style='float:inline-end;'>view</a>
                  </div>
               <?php }
            } else { ?>
               <tr>
                  <td colspan="8">
                     <div id="errorMessage" class="statusMessage error" style="margin-bottom: 1.5rem;">No Activity
                        Added Yet!.</div>
                  </td>
               </tr>
            <?php } ?>
         </div>

         <div class="couse-footer" style='width:100%;margin-top:4rem;'>
            <div class="more-btn">
               <a href="courses.html" class="inline-option-btn">view all Announcement</a>
            </div>
         </div>


      </section>



   </div>
</div>




<!-- <section class="courses">

   <h1 class="heading">our Activities</h1>

   <div class="box-container">

      <div class="box">
         <div class="tutor">
            <img src="images/pic-2.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-3.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-2.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete CSS tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-4.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-3.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JS tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-5.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-4.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete Boostrap tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-6.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-5.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JQuery tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-7.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-6.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete SASS tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>

   </div>

   <div class="more-btn">
      <a href="courses.html" class="inline-option-btn">view all courses</a>
   </div>

</section> -->



<?php include_once('user-footer.php') ?>