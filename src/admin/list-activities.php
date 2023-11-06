<?php include_once('admin-header.php') ?>


<section class="home-grid">

   <h1 class="heading">List of Activities</h1>

   <style>
      .cards .card {
         position: relative;
         padding: 30px 20px 10px 20px;
      }

      .topBtn {
         position: absolute;
         top: 5px;
         right: 5px;
         padding: 5px 10px;
         border-radius: 5px;
         background: var(--main-color);
         cursor: pointer;
         font-size: 14px;
      }

      .topBtn span {
         color: #fff;
      }

      .topBtn:hover {
         background: var(--hover);

      }
   </style>
   <div class="main">
      <div class="cards" id='cards'>
         <div class="card">
            <a class="topBtn">
               <span>View All</span>
            </a>
            <div class="card-content">
               <div class="number">
                  <?php echo $upcomingActivities ?>
               </div>
               <div class="card-name">Upcoming Activities</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-calendar-alt"></i>
            </div>
         </div>
         <div class="card">
            <a class="topBtn">
               <span>View All</span>
            </a>
            <div class="card-content">
               <div class="number">
                  <?php echo $doneActivities ?>
               </div>
               <div class="card-name">Done Activities</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-check-circle"></i>
            </div>
         </div>

      </div>
      <style>
         .view-ann {
            padding: 5px 10px;
            border-radius: 5px;
            background: var(--main-color);
            color: #fff;
            cursor: pointer;
            font-size: 18px;
         }

         .view-ann:hover {
            background: var(--hover);

         }

         #ann::after {
            content: "0";
            color: #fff;
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

         .setUserBtn {
            background-color: #dc3545 !important
         }

         .setUserBtn:hover {
            background-color: #c52636 !important;
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

      <div class="card-table">
         <div class="row">
            <h2>List of Activities</h2>
            <div class="table-container">
               <table id='activityTable'>
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Activity Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>OOTD</th>
                        <th>Remarks</th>
                        <th>Creator Name</th>
                        <!-- <th>Action</th> -->
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (!empty($activities)) {
                        $countActivity = 1;
                        foreach ($activities as $activity) { ?>
                           <tr>
                              <td>
                                 <?php echo $countActivity++; ?>
                              </td>
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
                                    <p>Upcoming</p>
                                 <?php } ?>
                              </td>
                              <td>
                                 <?php echo $activity['creator_name']; ?> <!-- New column -->
                              </td>
                              <!-- <td>
                                 <button class='actBtn viewUserBtn' id="<?php echo $activity['userID']; ?>">View</button>
                                 <button class='actBtn setUserBtn' id="<?php echo $user['userID']; ?>">Activate</button>

                              </td> -->

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


<!-- View User Info -->
<div id="viewUserModal" class="modal">
   <div class="modal-content" style="margin:8% auto; border-radius:10px; width:100%;">
      <div class="topLine"></div>
      <span class="close" onclick="closeModal()">&times;</span>
      <header>User Details</header>

      <style>
         .topLine {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            width: 100%;
            background: var(--main-color);
         }

         .user-modal-body {
            padding: 20px 10px;
            display: grid;
            gap: 20px;
            grid-template-columns: 2fr 2fr;
         }

         .user-modal-body .body-left {
            padding: 20px 10px;
         }

         .user-modal-body .body-left img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
            object-fit: cover
         }

         .user-modal-body .body-right {
            padding: 5px;
            /* margin-left: 10px; */
         }

         .user-modal-body .body-right .field-body {
            display: flex;
            align-items: center;
            line-height: 30px;
            flex-wrap: wrap;
         }

         .user-modal-body .body-right .field-body p {
            font-size: 16px;
            margin-left: 8px;
         }
      </style>
      <div class="user-modal-body">
         <div class="body-left">
            <img id="viewProfileImg">
         </div>
         <div class="body-right">
            <div class='field-body'>
               <h2>First Name: </h2>
               <p Id='viewfname'></p>
            </div>
            <div class='field-body'>
               <h2>Last Name: </h2>
               <p Id='viewlname'></p>
            </div>
            <div class='field-body'>
               <h2>Gender: </h2>
               <p Id='viewGender'></p>
            </div>
            <div class='field-body'>
               <h2>Address: </h2>
               <p Id='viewAddress'></p>
            </div>
            <div class='field-body'>
               <h2>Email: </h2>
               <p Id='viewEmail'></p>
            </div>
            <div class='field-body'>
               <h2> Created At: </h2>
               <p Id='viewCreatedAt'></p>
            </div>
            <div class='field-body'>
               <h2>Status: </h2>
               <p Id='viewStatus'></p>
            </div>
         </div>
      </div>

   </div>
</div>

<!-- SET USER -->
<!-- <div id="setUserModal" class="modal">
   <div class="modal-content" style="margin:8% auto; border-radius:10px; width:100%;">
      <div class="topLine"></div>
      <span class="close" onclick="closeModal()">&times;</span>
      <header>Set User</header>

      <style>
         .setBody {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
         }

         .setBody>div {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1rem;
         }

         .setBody button {
            padding: 10px;
            border-radius: 5px;
            border: none;
            outline: none;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
         }

         .setBody button:hover {
            background-color: #0063cd;
         }

         .setBody .deactv {
            background-color: #dc3545 !important;
         }

         .setBody .deactv:hover {
            background-color: #c52636 !important;

         }
      </style>
      <div class="setBody">
         <div>
            <button class="actv activateBtn" id="<?php echo $user['userID']; ?>">Activate</button>
         </div>
         <div>
            <button class='deactv deactivateBtn' id="<?php echo $user['userID']; ?>">Deactivate</button>
         </div>
      </div>
   </div>
</div> -->

<script>

   // VIEW Activity
   $(document).on('click', '.viewUserBtn', function () {
      const user_id = $(this).attr('id');
      // alert(user_id)
      $.ajax({
         type: "GET",
         url: "server.php",
         data: { user_id: user_id },
         success: function (response) {
            var res = JSON.parse(response);
            // console.log(res);
            if (res.status == 422) {
               alert(res.message);
            } else if (res.status == 200) {
               $('#viewProfileImg').attr('src', '../../User_img/' + res.data.profile_img);
               $('#viewfname').text(res.data.firstName);
               $('#viewlname').text(res.data.lastName);
               $('#viewGender').text(res.data.gender);
               $('#viewAddress').text(res.data.address);
               $('#viewEmail').text(res.data.email);
               var createdAt = new Date(res.data.created_at);
               var formattedCreatedAt = createdAt.toLocaleString(); // Format the datetime
               $('#viewCreatedAt').text(formattedCreatedAt);
               $('#viewStatus').text(res.data.status);

               $('#viewUserModal').css('display', 'block');


            }

         }
      });
   });


   //  ACTIVATE // DEACTIVE 
   $(document).on('click', '.setUserBtn', function (e) {
      e.preventDefault();

      var status = '<?php echo $user['status']; ?>';
      var action = status === 'active' ? 'Deactivate' : 'Activate';

      if (confirm("Are you sure you want to " + action + " this User Account?")) {
         var set_id = $(this).attr('id');
         $.ajax({
            type: "POST",
            url: "server.php",
            data: { set_id: set_id },
            success: function (response) {
               var res = JSON.parse(response);
               console.log(res)
               if (res.status == 500) {
                  alert(res.message);
               }
               else if (res.status == 200) {
                  alert(res.message);
                  // $('#activityTable').load(location.href + " #activityTable");
                  location.reload();
               }
            }

         })

      }



   })




</script>



<?php include_once('admin-footer.php') ?>