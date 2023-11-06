<?php include_once('admin-header.php') ?>


<section class="home-grid">

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
   </style>
   <div class="main">
      <div class="cards">
         <div class="card">
            <a class="topBtn" href='list-users.php'>
               <span>View All</span>
            </a>
            <div class="card-content">
               <div class="number">
                  <?php echo $totalUser ?>
               </div>
               <div class="card-name">Total User</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-users"></i>
            </div>
         </div>
         <div class="card">
            <a class="topBtn" href='list-activities.php'>
               <span>View All</span>
            </a>
            <div class="card-content">
               <div class="number">
                  <?php echo $totalActivities ?>
               </div>
               <div class="card-name">Total Activities</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-list"></i>
            </div>
         </div>
         <div class="card">
            <div class="card-content">
               <div class="number">68</div>
               <div class="card-name">Employees</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-users"></i>
            </div>
         </div>
         <div class="card">
            <a class="topBtn" href='announcement.php'>
               <span>View All</span>
            </a>
            <div class="card-content">
               <div class="number">14</div>
               <div class="card-name">Announcement</div>
            </div>
            <div class="icon-box">
               <i class="fas fa-message "></i>
            </div>
         </div>
      </div>


      <div class="charts">
         <div class="chart">
            <h2>Activities</h2>
            <div>
               <canvas id="activityChart"></canvas>
            </div>
         </div>
         <div class="chart doughnut-chart">
            <h2>Gender</h2>
            <div>
               <canvas id="doughnut" class="pie"></canvas>
            </div>
         </div>
      </div>

   </div>


</section>

<script>
   // Gender Pie Charts
   var labels = <?php echo json_encode(array_keys($genderData)); ?>;
   var data = <?php echo json_encode(array_values($genderData)); ?>;

   var ctx = document.getElementById('doughnut').getContext('2d');
   var genderChart = new Chart(ctx, {
      type: 'pie',
      data: {
         labels: labels,
         datasets: [{
            data: data,
            backgroundColor: [
               '#FF6384',
               '#36A2EB',
               '#FFCE56'
            ]
         }]
      }
   });

   // Activities Bar Charts
   var activityLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
   var activityData = <?php echo json_encode(array_values($activityData)); ?>;
   activityData.push(<?php echo array_sum($activityData); ?>);

   var activityCtx = document.getElementById('activityChart').getContext('2d');
   var activityChart = new Chart(activityCtx, {
      type: 'bar',
      data: {
         labels: activityLabels,
         datasets: [{
            label: 'Number of Activities',
            data: activityData,
            backgroundColor: '#8e44ada3',
            borderColor: '#793398',
            borderWidth: 1
         }]
      },
      options: {
         responsive: true,
         scales: {
            y: {
               beginAtZero: true,
               stepSize: 1,
               ticks: {
                  callback: function (value, index, values) {
                     if (index === values.length - 1) {
                        return 'Total: ' + value;
                     } else {
                        return value;
                     }
                  }
               }
            }
         }
      }
   });





</script>

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



<?php include_once('admin-footer.php') ?>