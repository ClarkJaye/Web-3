<?php include_once('admin-header.php') ?>


<section class="home-grid" id='announcePage'>

   <h1 class="heading">Dashboard</h1>

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
         /* color: var(--white); */
         cursor: pointer;
         font-size: 14px;
      }

      .topBtn span {
         color: white;
      }

      .topBtn:hover {
         background: var(--hover);

      }

      .announce-footer {
         display: flex;
         align-items: center;
         justify-content: center;
      }
   </style>
   <div class="main">
      <div class="cards">
         <div class="card">
            <a class="topBtn" href='#'>
               <span>View All</span>
            </a>
            <div class="card-content">
               <div class="number">
                  <?php echo $totalAnnouncements ?>
               </div>
               <div class="card-name">Total Announcement</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-users"></i>
            </div>
         </div>

         <div class="card-header">
            <div id="addAnnounceBtn" class="btn" style='width:max-content;display:flex;align-items:center;'>
               <i class='bi bi-plus'></i>
               <span>Add Announcement</span>
            </div>
         </div>
      </div>


      <!-- Announcement -->
      <section class="announce" id='announceSection'>

         <h1 class="heading">Announcement</h1>


         <div class="box-container">
            <?php if (!empty($announcements)) {
               foreach ($announcements as $announce) { ?>
                  <div class="box">
                     <div class="tutor">
                        <img src="../../User_img/pic-2.jpg" alt="">
                        <div class="info">
                           <h3>
                              <?php echo $announce['creator_name']; ?>
                           </h3> 
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


</section>


<!-- Modal -->
<!-- ADD Announcement -->
<div id="announcementModal" class="modal">
   <div class="modal-content" style="margin:8% auto;border-radius:1rem;">
      <span class="close" onclick="closeModal()">&times;</span>
      <header>Add Announcement</header>

      <div id="errorMessage" class="statusMessage d-none"></div>

      <form id="announceForm">

         <div class='field input-field'>
            <input type='text' name='nameAnnouncement' id='nameAnnouncement' placeholder='Title'>
         </div>

         <!-- Activity Location -->
         <div class='field input-field'>
            <textarea type='text' name='contentAnnounce' id='contentAnnounce' placeholder='Content here'></textarea>
         </div>

         <div class='field input-field'>
            <button class='setBtn' style='display:flex;float:inline-end;font-size:17px;'>Post</button>

         </div>
      </form>
   </div>
</div>


<div class="alertMessageTop d-none">

</div>
<style>
   .alertMessageTop {
      position: fixed;
      top: 25px;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      color: white;
      background-color: var(--orange);
      padding: 5px 10px;
      border-radius: 5px;
      transform: .5s ease-in-out;
      font-size: 18px;
   }

   .d-none {
      display: none;
   }
</style>


<script>
   // ADD Announcement
   $(document).on('submit', '#announceForm', function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      formData.append('addAnnouncement', true)
      $.ajax({
         type: "POST",
         url: "server.php",
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
               $('#alertMessageTop').removeClass('d-none');
               $('#alertMessageTop').text(res.message);

               $('#announceForm')[0].reset()
               $('#announcementModal').css('display', 'none');

               $('#announcePage').load(location.href + " #announcePage");


            } else if (res.status == 450) {
               $('#errorMessage').removeClass('d-none');
               $('#errorMessage').addClass('error');
               $('#errorMessage').text(res.message);

            }
         }

      })

   });
</script>



<?php include_once('admin-footer.php') ?>