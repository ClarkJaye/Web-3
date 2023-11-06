<?php include_once('user-header.php') ?>


<section class="home-grid" id="activities">

   <h1 class="heading">Activities</h1>

   <div class="main">
      <div class="cards">
         <div class="card">
            <div class="card-content">
               <div class="number">
                  <?php echo $doneActivities ?>
               </div>
               <div class="card-name"> Done Activity </div>
            </div>
         </div>
         <div class="card">
            <div class="card-content">
               <div class="number">
                  <?php echo $upcomingActivities ?>
               </div>
               <div class="card-name"> Upcoming Activity</div>
            </div>
         </div>
         <div class="card">
            <div class="card-content">
               <div class="number"><button class="view-ann" id="showSetModalBtn"
                     style='width:100%; color: #fff;'>SET</button></div>
               <div class="card-name">Set Activity</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-edit"></i>
            </div>
         </div>
         <div class="card-header">
            <div id="addActBtn" class="btn" style='width:200px;display:flex;align-items:center;'>
               <i class='bi bi-plus'></i>
               <span>Add Activity</span>
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


      <div class="card-table">
         <div class="row">
            <h2>Activities</h2>
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
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (!empty($activities)) {
                        $countActivity = 1;
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
                                    <p>Not Yet Set</p>
                                 <?php } ?>
                              </td>
                              <td>
                                 <button class='actBtn viewBtn' id="<?php echo $activity['id']; ?>">View</button>
                                 <button class='actBtn editBtn' id="<?php echo $activity['id']; ?>">Edit</button>
                                 <button class='actBtn deleteBtn' id="<?php echo $activity['id']; ?>">Delete</button>
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
      </div>



</section>


<!-- Modal -->
<style>
   table {
      width: 100%;
      border: 1px solid var(--black);
      border-collapse: collapse;
      vertical-align: middle;
      text-align: center;
      font-size: 14px;
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

   .setBtn {
      border: none;
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
      padding: 6px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      font-size: 16px;
      border: none;
      border-radius: 5px;
   }

   .setBtn:hover {
      background-color: #0063cd;
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

<!-- Set Activity -->
<div id="setActivityModal" class="modal" style="overflow:auto; ">
   <div class="modal-content" style="margin:8% auto; max-width: 1000px; ">
      <span class="close" onclick="closeModal()">&times;</span>
      <header>Set Activity</header>
      <p style='font-size:17px;margin-bottom:1rem;'>Activities that are not Yet Done or Set.</p>
      <div id="errorMessage" class="statusMessage d-none"></div>
      <div class="setTableActivity">
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
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               if (!empty($activities)) {
                  $countActivity = 1;
                  foreach ($activities as $activity) {
                     if ($activity['status'] == 'upcoming') {
                        ?>
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
                              <img src="<?php echo "../../activity_savedpictures/" . $activity['image']; ?>" alt="Activity Image"
                                 style="width: 150px; height:100px; object-fit:cover; border-radius: 5px;">
                           </td>
                           <td>
                              <?php if ($activity['status'] == 'done') {
                                 echo $activity['remarks'];
                              } else { ?>
                                 <p>Not Yet Set</p>
                              <?php } ?>
                           </td>
                           <td>
                              <?php if ($activity['status'] == 'done') { ?>
                                 <button class='setBtn success' id="<?php echo $activity['id']; ?>">Completed</button>
                              <?php } else { ?>
                                 <button class='setBtn' id="<?php echo $activity['id']; ?>">Mark as Done</button>
                              <?php } ?>
                           </td>
                        </tr>
                        <?php
                     }
                  }
               } else { ?>
                  <tr>
                     <td colspan="8">
                        <div id="errorMessage" class="statusMessage error" style="margin-bottom: 1.5rem;">No Activity Added
                           Yet!.</div>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>



   </div>
</div>


<!-- Set Activity -->
<div id="setActivityModalForm" class="modal" style="overflow:auto; z-index: 9999;">
   <div class="modal-content" style="margin:8% auto;">
      <span class="close" onclick="closeModal()">&times;</span>
      <header>Set Activity</header>

      <div id="errorMessageSet" class="statusMessage d-none"></div>

      <form id="setActivity" enctype="multipart/form-data">
         <!-- Activity Name -->
         <input type='text' name='setId' id='setId' placeholder='id' class='input'>
         <div class='field input-field'>
            <input type='text' name='setnameActivity' id='setnameActivity' placeholder='Name Activity' class='input'
               style='border:none; font-weight:bold; font-size:20px;' disabled>
         </div>

         <div class='field input-field'>
            <textarea name="setRemarks" id="setRemarks" cols="30" rows="5" placeholder='Remarks here...'></textarea>
         </div>

         <div class='field button-field'>
            <input type='submit' class='addActivity' id='submitBtn' name='addActivity' value='Done'>
         </div>
      </form>
   </div>
</div>


<!-- ADD Activity -->
<div id="activityModal" class="modal" style="overflow:auto;">
   <div class="modal-content" style="margin:8% auto;">
      <span class="close" onclick="closeModal()">&times;</span>
      <header>Add Activity</header>

      <div id="errorMessage" class="statusMessage d-none"></div>

      <form id="addActivity" enctype="multipart/form-data">
         <!-- Activity Name -->
         <div class='field input-field'>
            <input type='text' name='nameActivity' placeholder='Name Activity' class='input'>
         </div>

         <!-- Activity Location -->
         <div class='field input-field'>
            <input type='text' name='location' placeholder='Location' class='input'>
         </div>

         <!-- Activity Date & Time -->
         <div class='field input-field' style="display: flex; align-items:center; gap: 20px;">
            <div>
               <label>Date: </label>
               <input type='date' name='date' placeholder='Date' class='date'>
            </div>
            <div>
               <label>Time: </label>
               <input type='time' name='time' placeholder='Time' class='time'>
            </div>
         </div>

         <!-- Activity File OOTD -->
         <div class='field input-field'>
            <label>OOTD: </label>
            <div class="img-cont" style="display: none;">
               <img id="choosen-img">

            </div>
            <div class="photo-cont">
               <input type='file' id="file" name='image' class='file' accept='image/*' style="margin-bottom: 20px;">
               <label class="photo-btn" for="file" style="margin-bottom: 0;"><i class="bi bi-upload"></i> Choose a
                  Photo</label>
               <div style="margin-left:8px;">
                  <span id="photo-name"></span>
               </div>
            </div>
         </div>

         <div class='field button-field'>
            <input type='submit' class='addActivity' id='submitBtn' name='addActivity' value='Add'>
         </div>
      </form>
   </div>
</div>

<!-- Edit Activity -->
<div id="editActivityModal" class="modal" style="overflow:auto;">
   <div class="modal-content" style="margin:8% auto;">
      <span class="close" onclick="closeModal()">&times;</span>
      <header>Edit Activity</header>

      <div id="errorMessageUpdate" class="statusMessage d-none"></div>

      <form id="updateActivityForm" enctype="multipart/form-data">
         <!-- Activity Name -->
         <input type='hidden' name='editId' id='editId' placeholder='Activity Id ' class='input'>

         <div class='field input-field'>
            <input type='text' name='nameActivity' id='nameActivity' placeholder='Name Activity' class='input'>
         </div>

         <!-- Activity Location -->
         <div class='field input-field'>
            <input type='text' name='location' id='location' placeholder='Location' class='input'>
         </div>

         <!-- Activity Date & Time -->
         <div class='field input-field' style="display: flex; align-items:center; gap: 20px;">
            <div>
               <label>Date: </label>
               <input type='date' name='date' id='date' placeholder='Date' class='date'>
            </div>
            <div>
               <label>Time: </label>
               <input type='time' name='time' id='time' placeholder='Time' class='time'>
            </div>
         </div>

         <div class='field input-field'>
            <label for="edit-file">OOTD: </label>
            <div class="edit-img-cont" id="edit-img-cont" style="display:none;">
               <img id="edit-choosen-img">
            </div>
            <div class="edit-photo-cont">
               <input type='file' id="edit-file" name='updateImg' class='file' accept='image/*'
                  style="margin-bottom: 20px;">
               <label class="photo-btn" for="edit-file" style="margin-bottom: 0;"><i class="bi bi-upload"></i> Choose a
                  Photo</label>
               <div style="margin-left:8px;">
                  <span id="edit-photo-name"></span>
               </div>
            </div>
         </div>

         <div class='field button-field'>
            <input type='submit' class='addActivity' id='submitBtn' name='addActivityBtn' value='Update Activity'>
         </div>
      </form>
   </div>
</div>

<style>
   img#view-choosen-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 5%;
   }

   #view-photo-name {
      font-size: 18px;
   }
</style>

<!-- View Activity -->
<div id="viewActivityModal" class="modal" style="overflow:auto;">
   <div class="modal-content" style="margin:8% auto;">
      <span class="close" onclick="closeModal()">&times;</span>
      <header> Activity Details</header>
      <div id="errorMessage" class="statusMessage "></div>

      <form enctype="multipart/form-data">
         <!-- Activity Name -->
         <div class='field input-field'>
            <input type='text' name='nameActivity' id='viewnameActivity' placeholder='Name Activity' class='input'
               required>
         </div>

         <!-- Activity Location -->
         <div class='field input-field'>
            <input type='text' name='location' id='viewlocation' placeholder='Location' class='input' required>
         </div>

         <!-- Activity Date & Time -->
         <div class='field input-field' style="display: flex; align-items:center; gap: 20px;">
            <div>
               <label>Date: </label>
               <input type='date' name='date' id='viewdate' placeholder='Date' class='input'>
            </div>
            <div>
               <label>Time: </label>
               <input type='time' name='time' id='viewtime' placeholder='Time' class='input'>
            </div>
         </div>

         <!-- Activity File OOTD -->
         <div class='field input-field'>

            <label>OOTD: </label>
            <div class="img-cont">
               <img id="view-choosen-img">
            </div>

         </div>

         <!-- <div class='field button-field'>
         <input type='submit' class='addActivity' id='submitBtn' name='addActivity' value='Add'>
         </div> -->

      </form>
   </div>
</div>



<!-- AJAX -->
<script>


   // SET Activity
   $(document).on('click', '.setBtn', function () {
      const act_id = $(this).attr('id');
      // alert(act_id)
      $.ajax({
         type: "GET",
         url: "../communicate.php",
         data: { act_id: act_id },
         success: function (response) {
            var res = JSON.parse(response);
            console.log(res);
            if (res.status == 422) {
               alert(res.message);
            } else if (res.status == 200) {
               $('#setId').val(res.data.id);
               $('#setnameActivity').val(res.data.activityName);

               $('#setActivityModalForm').css('display', 'block');
            }
         }
      });

   });

   // ADD REMARKS
   $(document).on('submit', '#setActivity', function (e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append('set_activity', true);
      $.ajax({
         type: "POST",
         url: "../communicate.php",
         data: formData,
         processData: false,
         contentType: false,
         success: function (response) {
            console.log(response)
            var res = jQuery.parseJSON(response);

            if (res.status == 422) {
               alert(res.message);
            } else if (res.status == 200) {
               alert(res.message);
               $('#setActivityModalForm').css('display', 'none');

               $('#setActivity')[0].reset();

               location.reload();

            } else if (res.status == 500) {

               alert(res.message);

            }
         }

      })

   });




   // VIEW Activity
   $(document).on('click', '.viewBtn', function () {
      const act_id = $(this).attr('id');
      $.ajax({
         type: "GET",
         url: "../communicate.php",
         data: { act_id: act_id },
         success: function (response) {
            var res = JSON.parse(response);
            console.log(res);
            if (res.status == 422) {
               alert(res.message);
            } else if (res.status == 200) {
               $('#viewnameActivity').val(res.data.activityName);
               $('#viewlocation').val(res.data.location);
               // Convert date and time to appropriate format
               var dateParts = res.data.dateOfActivity.split('/');
               var formattedDate = dateParts[2] + '-' + dateParts[0] + '-' + dateParts[1];
               $('#viewdate').val(formattedDate);
               $('#viewtime').val(res.data.timeOfActivity.split(' ')[0]);

               var filename = res.data.image;
               $('#view-photo-name').text(filename);
               $('#view-choosen-img').attr('src', '../../activity_savedpictures/' + filename);

               $('#viewActivityModal').css('display', 'block');
            }
         }
      });
   });



   // ADD
   $(document).on('submit', '#addActivity', function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      formData.append('add_activity', true)
      $.ajax({
         type: "POST",
         url: "../communicate.php",
         data: formData,
         processData: false,
         contentType: false,
         success: function (response) {
            console.log(response)
            var res = jQuery.parseJSON(response);
            if (res.status == 422) {

               $('#errorMessage').removeClass('d-none');
               $('#errorMessage').addClass('error');
               $('#errorMessage').text(res.message);

            } else if (res.status == 200) {
               $('#errorMessage').removeClass('d-none');
               $('#errorMessage').removeClass('error');
               $('#errorMessage').addClass('success');
               $('#errorMessage').text(res.message);

               $('#addActivity')[0].reset()
               $('#activityModal').css('display', 'none');

               $('#activityTable').load(location.href + " #activityTable");


            } else if (res.status == 450) {
               $('#errorMessage').removeClass('d-none');
               $('#errorMessage').addClass('error');
               $('#errorMessage').text(res.message);

            }
         }

      })

   });

   // Before Updating the Activity 
   $(document).on('click', '.editBtn', function () {
      const act_id = $(this).attr('id')
      $.ajax({
         type: "GET",
         url: "../communicate.php?act_id=" + act_id,
         success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 422) {
               alert(res.message)
            } else if (res.status == 200) {
               $('#editId').val(res.data.id);
               $('#nameActivity').val(res.data.activityName);
               $('#location').val(res.data.location);

               // Convert date and time to appropriate format
               var dateParts = res.data.dateOfActivity.split('/');
               var formattedDate = dateParts[2] + '-' + dateParts[0] + '-' + dateParts[1];
               $('#date').val(formattedDate);
               $('#time').val(res.data.timeOfActivity.split(' ')[0]);

               var filename = res.data.image;

               if (filename) {
                  $('#edit-file').val();
                  $('#edit-photo-name').text(filename);
                  $('#edit-choosen-img').attr('src', '../../activity_savedpictures/' + filename);
                  $('.edit-img-cont').show();
               } else {
                  $('#edit-file').val('');
                  $('#edit-photo-name').text('No image selected');
                  $('#edit-choosen-img').attr('src', '');
                  $('.edit-img-cont').hide();
               }


               $('#editActivityModal').css('display', 'block');


            }
         }

      })


   });
   // UPDATE
   $(document).on('submit', '#updateActivityForm', function (e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append('update_activity', true);
      $.ajax({
         type: "POST",
         url: "../communicate.php",
         data: formData,
         processData: false,
         contentType: false,
         success: function (response) {
            console.log(response)
            var res = jQuery.parseJSON(response);

            if (res.status == 422) {
               $('#errorMessageUpdate').addClass('error');
               $('#errorMessageUpdate').text(res.message);
               $('#errorMessageUpdate').removeClass('d-none');

               setTimeout(function () {
                  $('#errorMessageUpdate').addClass('d-none');

               }, 3000);

            } else if (res.status == 200) {
               $('#errorMessageUpdate').removeClass('d-none');
               $('#errorMessageUpdate').removeClass('error');
               $('#errorMessageUpdate').addClass('success');
               $('#errorMessageUpdate').text(res.message);
               $('#editActivityModal').css('display', 'none');

               $('#updateActivityForm')[0].reset();

               $('#activityTable').load(location.href + " #activityTable");


            } else if (res.status == 500) {
               $('#errorMessageUpdate').removeClass('d-none');
               $('#errorMessageUpdate').addClass('error');
               $('#errorMessageUpdate').text(res.message);

            }
         }

      })

   });


   // DELETE Activity
   $(document).on('click', '.deleteBtn', function (e) {
      e.preventDefault();

      if (confirm("Are you sure you want to delete this Activity?")) {

         var act_id = $(this).attr('id');
         $.ajax({
            type: "POST",
            url: "../communicate.php",
            data: { delete_act: act_id },
            success: function (response) {
               var res = JSON.parse(response);
               console.log(res)
               if (res.status == 500) {
                  alert(res.message);
               }
               else if (res.status == 200) {
                  alert(res.message);
                  $('#activityTable').load(location.href + " #activityTable");

               }
            }

         })

      }



   })




</script>

<?php include_once('user-footer.php') ?>