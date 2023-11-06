<?php
session_start();

// Authorized
// if (!empty($_SESSION["Role"])) {
//   if ($_SESSION["Role"] == "admin") {
//       header("Location: src/admin/dashboard.php");
//       exit;
//   } else if ($_SESSION["Role"] == "user") {
//       header("Location: src/user/dasboard.php");
//       exit;
//   }
// }






?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Title  -->
  <title>Landing Page</title>
  <meta name="description"
    content="Bootstrap 5 landing page template with flat design and fast loading. Create great website with Onekit landing page template." />

  <!--Styles-->
  <link rel="stylesheet" href="assets/css/theme.css" />

  <!-- Css Optimize -->
  <!-- <link rel="stylesheet" href="dist/css/bundle.min.css"> -->

  <!-- PWA Optimize -->
  <meta name="theme-color" content="#5b2be0" />

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&amp;display=swap" rel="stylesheet" />

  <!-- Icon -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Favicon  -->
  <link href="assets/img/logo.png" rel="icon" />
  <link href="assets/img/jclogo.png" rel="apple-touch-icon" />

  <link href="assets/css/login.css" rel="stylesheet" />

  <!-- Vendor Css Files -->
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

</head>

<body id="top">
  <style>
    body {
      overflow: hidden;
    }

    .navbar {
      background: transparent;
      transition: background-color 0.3s ease;
    }

    .navbar.scrolled {
      background-color: #fff;
      color: black;
    }

    .navbar .navbar-collapse .nav-link.scrolled,
    .navbar .container h2.scrolled {
      color: black !important;
    }
  </style>

  <script>
    window.addEventListener("scroll", function () {
      const navbar = document.querySelector(".navbar");
      const text = document.querySelectorAll(".navbar-collapse .nav-link");
      const txtlogo = document.querySelector(".navbar .container h2");
      const scrolled = window.scrollY > 0;

      if (scrolled) {
        navbar.classList.add("scrolled");
        txtlogo.classList.add("scrolled");
        text.forEach((link) => link.classList.add("scrolled"));
      } else {
        navbar.classList.remove("scrolled");
        txtlogo.classList.remove("scrolled");
        text.forEach((link) => link.classList.remove("scrolled"));
      }
    });
  </script>

  <!-- ========== { HEADER }==========  -->
  <header>
    <!-- Navbar -->
    <nav class="main-nav navbar navbar-expand-lg hover-navbar dark-to-light fixed-top navbar-dark">
      <div class="container">
        <a class="navbar-brand main-logo" href="#">
          <h2 class="display-5 fw-bold text-white">
            <span class="text-warning">Activity</span>Hub
          </h2>
        </a>

        <!-- navbar toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo"
          aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- collapse menu -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo">
          <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
          </ul>
          <div class="d-grid d-lg-block my-3 my-lg-0 ms-0 ms-lg-4">
            <a id="LoginBtn" class="btn btn-warning btn-sm">Login</a>
          </div>
        </div>
        <!-- end collapse menu -->
      </div>
    </nav>
    <!-- End Navbar -->
  </header>
  <!-- end header -->

  <style>
    body {
      overflow-y: none;
    }

    #hero {
      height: 100vh;
    }

    #LoginBtn {
      cursor: pointer;
    }

    .modal-container {
      position: relative;
    }

    .modal-container #close {
      color: black;
      font-size: 30px;
      font-weight: bold;
      cursor: pointer;
      position: absolute;
      top: 5px;
      right: 5px;
      z-index: 999;
      padding: 0 10px;
      text-align: center;
    }

    .modal-container #close:hover {
      color: rgba(0, 0, 0, 0.527);
    }

    .form-link {
      text-align: center;
      margin: 10px 0;
      width: 95%;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    #gender {
      width: 90%;
      background: transparent;
      border: none;
      padding: 10px;
      font-size: 14px;
      color: #444;
    }

    .error {
      border: 2px solid red !important;
    }

    .error-message {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }

    /* Profile */
    #file {
      display: none;
    }

    #photo-name {
      cursor: pointer;
    }

    .img-cont {
      width: 90%;
      margin: auto;
    }

    #choosen-img {
      max-height: 300px;
      width: 100%;
      object-fit: contain;
      border-radius: 5px;
      margin: auto;
    }

    .photo-cont {
      display: flex;
      align-items: center;
      padding: 5px 0 20px 0;
    }

    .photo-btn {
      display: block;
      position: relative;
      background-color: #df4adf;
      color: #fff;
      font-size: 14px;
      text-align: center;
      padding: 10px 0;
      width: 150px;
      border-radius: 5px;
      cursor: pointer;
    }

    .photo-btn:hover {
      background-color: #c03cc0;
    }

    /* Error Message */
    .statusMessage {
      padding: 10px;
      width: 75%;
      border-radius: 4px;
      font-size: 16px;
      text-align: center;
    }

    .error {
      color: #721c24 !important;
      background-color: #f8d7da !important;
      border-color: #f5c6cb !important;
    }

    .success {
      color: #004085 !important;
      background-color: #cce5ff !important;
      border-color: #b8daff !important;
    }

    .d-none {
      display: none;
    }
  </style>

  <!-- Modal -->
  <div id="signModal" class="modal">
    <div class="modal-container">
      <i class="bi bi-close btn btn-warning" id="close">x</i>
      <div class="signin-signup">
        <!-- Login -->
        <form id="loginUser" class="sign-in-form">
          <div id="errorMessage" class="statusMessage d-none"></div>
          <h2 class="title">Sign in</h2>
          <div class="input-field" style="margin: 10px 0">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Username" name="email" />
          </div>
          <div class="input-field" style="margin: 10px 0">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <div class="form-link">
            <span class="checkbox">
              <input type="checkbox" id="check" />
              <label for="check">Remember Me</label>
            </span>
            <a href="#" class="forgot-pass">Forgot password?</a>
          </div>
          <input type="submit" value="Login" class="submitBtn" name="loginBtn" />

          <p class="social-text">Or Sign in with social platform</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
          <p class="account-text">
            Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a>
          </p>
        </form>

        <!-- Register -->
        <form class="sign-up-form" enctype="multipart/form-data" id="registerUser">
          <div id="errorMessageReg" class="statusMessage d-none"></div>
          <h2 class="title">Sign up</h2>
          <div class="scl">
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Firstname" name="firstname" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Lastname" name="lastname" />
            </div>

            <div class="input-field" style="padding: 10px">
              <i class="fas fa-venus-mars"></i>
              <select id="gender" name="gender">
                <option value="">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
              </select>
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" />
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Address" name="address" />
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm-password" name="confirm-password" />
            </div>

            <!-- Profile -->
            <div class="prof-cont">
              <label>Profile: </label>
              <div class="img-cont" style="display: none">
                <!-- <img id="choosen-img" /> -->
              </div>
              <div class="photo-cont">
                <input type="file" id="file" name="profileImg" class="file" accept="image/*"
                  style="margin-bottom: 20px" />
                <label class="photo-btn" for="file" style="margin-bottom: 0"><i class="bi bi-upload"></i> Choose a
                  Photo</label>
                <div style="margin-left: 8px">
                  <span id="photo-name"></span>
                </div>
              </div>
            </div>

          </div>
          <input type="submit" value="Sign up" class="submitBtn" name="registerBtn" />
          <p class="social-text">Or Sign in with social platform</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
          <p class="account-text">
            Already have an account? <a href="#" id="sign-in-btn2">Sign in</a>
          </p>
        </form>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Member of Brand?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque
              accusantium dolor, eos incidunt minima iure?
            </p>
            <button class="submitBtn" id="sign-in-btn">Sign in</button>
          </div>
          <img src="assets/img/signin.svg" alt="" class="image" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>New to Brand?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque
              accusantium dolor, eos incidunt minima iure?
            </p>
            <button class="submitBtn" id="sign-up-btn">Sign up</button>
          </div>
          <img src="assets/img/signup.svg" alt="" class="image" />
        </div>
      </div>
    </div>
  </div>


  <!-- =========={ MAIN }==========  -->
  <main id="content">
    <!-- =========={ HERO }==========  -->
    <div id="hero" class="section bg-gradient-primary py-8 py-lg-9 overflow-hidden">
      <!-- background overlay -->
      <div class="overlay bg-gradient-primary opacity-90 z-index-n1"></div>

      <!-- rocket moving up animation -->
      <div class="particle">
        <div class="particle-move-up d-none d-lg-block particle-move-up-1 text-light z-index-n1 opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="2rem" height="2rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
        <div class="particle-move-up particle-move-up-2 text-light z-index-n1 opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="1rem" height="1rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
        <div class="particle-move-up d-none d-sm-block particle-move-up-3 text-light z-index-n1 opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="1.2rem" height="1.2rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
        <div class="particle-move-up d-none d-xl-block particle-move-up-4 text-light z-index-n1 opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="1rem" height="1rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
        <div class="particle-move-up d-none d-sm-block particle-move-up-5 text-light z-index-n1 opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="1.2rem" height="1.2rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
        <div class="particle-move-up border-success text-light particle-move-up-6 z-index-n1 opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="2rem" height="2rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
        <div class="particle-move-up particle-move-up-7 z-index-n1 text-light opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="1.2rem" height="1.2rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
        <div class="particle-move-up particle-move-up-8 z-index-n1 text-light opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="1.2rem" height="1.2rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
        <div class="particle-move-up particle-move-up-9 z-index-n1 text-light opacity-60">
          <svg xmlns="http://www.w3.org/2000/svg" class="rotate-315" width="2rem" height="2rem" fill="currentColor"
            viewBox="0 0 512 512">
            <path
              d="M461.81,53.81a4.4,4.4,0,0,0-3.3-3.39c-54.38-13.3-180,34.09-248.13,102.17a294.9,294.9,0,0,0-33.09,39.08c-21-1.9-42-.3-59.88,7.5-50.49,22.2-65.18,80.18-69.28,105.07a9,9,0,0,0,9.8,10.4l81.07-8.9a180.29,180.29,0,0,0,1.1,18.3,18.15,18.15,0,0,0,5.3,11.09l31.39,31.39a18.15,18.15,0,0,0,11.1,5.3,179.91,179.91,0,0,0,18.19,1.1l-8.89,81a9,9,0,0,0,10.39,9.79c24.9-4,83-18.69,105.07-69.17,7.8-17.9,9.4-38.79,7.6-59.69a293.91,293.91,0,0,0,39.19-33.09C427.82,233.76,474.91,110.9,461.81,53.81ZM298.66,213.67a42.7,42.7,0,1,1,60.38,0A42.65,42.65,0,0,1,298.66,213.67Z"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
            <path class="text-warning" fill="currentColor"
              d="M109.64,352a45.06,45.06,0,0,0-26.35,12.84C65.67,382.52,64,448,64,448s65.52-1.67,83.15-19.31A44.73,44.73,0,0,0,160,402.32"
              style="
                  fill: none;
                  stroke: currentColor;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 32px;
                " />
          </svg>
        </div>
      </div>

      <!-- scribble -->
      <figure class="scribble scale-4 opacity-10 top-50 start-0 z-index-n1" data-aos="fade-up-right"
        data-aos-delay="300">
        <svg class="text-secondary" width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="currentColor"
            d="M42.5,-66.2C57.1,-56.7,72.5,-48.4,81.1,-35.3C89.8,-22.2,91.8,-4.4,89.6,13C87.3,30.4,80.7,47.4,69.5,60.1C58.3,72.9,42.4,81.5,25.9,84.6C9.5,87.8,-7.4,85.4,-22.7,79.8C-37.9,74.1,-51.5,65.2,-60.9,53.3C-70.4,41.4,-75.8,26.6,-79,10.8C-82.1,-5,-83.1,-21.7,-77.7,-36.4C-72.4,-51,-60.7,-63.7,-46.7,-73.5C-32.7,-83.3,-16.4,-90.1,-1.2,-88.2C13.9,-86.3,27.8,-75.7,42.5,-66.2Z"
            transform="translate(100 100)" />
        </svg>
      </figure>

      <!-- scribble -->
      <figure class="scribble scale-5 opacity-10 top-50 start-0 z-index-n1" data-aos="fade-up-right"
        data-aos-delay="200">
        <svg class="text-secondary" width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="currentColor"
            d="M42.5,-66.2C57.1,-56.7,72.5,-48.4,81.1,-35.3C89.8,-22.2,91.8,-4.4,89.6,13C87.3,30.4,80.7,47.4,69.5,60.1C58.3,72.9,42.4,81.5,25.9,84.6C9.5,87.8,-7.4,85.4,-22.7,79.8C-37.9,74.1,-51.5,65.2,-60.9,53.3C-70.4,41.4,-75.8,26.6,-79,10.8C-82.1,-5,-83.1,-21.7,-77.7,-36.4C-72.4,-51,-60.7,-63.7,-46.7,-73.5C-32.7,-83.3,-16.4,-90.1,-1.2,-88.2C13.9,-86.3,27.8,-75.7,42.5,-66.2Z"
            transform="translate(100 100)" />
        </svg>
      </figure>

      <!-- scribble -->
      <figure class="scribble scale-6 opacity-10 top-50 start-0 z-index-n1" data-aos="fade-up-right"
        data-aos-delay="100">
        <svg class="text-secondary" width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="currentColor"
            d="M42.5,-66.2C57.1,-56.7,72.5,-48.4,81.1,-35.3C89.8,-22.2,91.8,-4.4,89.6,13C87.3,30.4,80.7,47.4,69.5,60.1C58.3,72.9,42.4,81.5,25.9,84.6C9.5,87.8,-7.4,85.4,-22.7,79.8C-37.9,74.1,-51.5,65.2,-60.9,53.3C-70.4,41.4,-75.8,26.6,-79,10.8C-82.1,-5,-83.1,-21.7,-77.7,-36.4C-72.4,-51,-60.7,-63.7,-46.7,-73.5C-32.7,-83.3,-16.4,-90.1,-1.2,-88.2C13.9,-86.3,27.8,-75.7,42.5,-66.2Z"
            transform="translate(100 100)" />
        </svg>
      </figure>

      <!-- scribble -->
      <figure class="scribble scale-7 opacity-10 top-50 start-0 z-index-n1" data-aos="fade-up-right">
        <svg class="text-secondary" width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="currentColor"
            d="M42.5,-66.2C57.1,-56.7,72.5,-48.4,81.1,-35.3C89.8,-22.2,91.8,-4.4,89.6,13C87.3,30.4,80.7,47.4,69.5,60.1C58.3,72.9,42.4,81.5,25.9,84.6C9.5,87.8,-7.4,85.4,-22.7,79.8C-37.9,74.1,-51.5,65.2,-60.9,53.3C-70.4,41.4,-75.8,26.6,-79,10.8C-82.1,-5,-83.1,-21.7,-77.7,-36.4C-72.4,-51,-60.7,-63.7,-46.7,-73.5C-32.7,-83.3,-16.4,-90.1,-1.2,-88.2C13.9,-86.3,27.8,-75.7,42.5,-66.2Z"
            transform="translate(100 100)" />
        </svg>
      </figure>

      <div class="container">
        <!-- row -->
        <div class="row justify-content-center">
          <!-- hero content -->
          <div class="col-md-9 col-lg-6 align-self-center pe-lg-5" data-aos="flip-up">
            <div class="text-center text-lg-start mt-4 mt-lg-0">
              <div class="mb-5">
                <h1 class="display-5 fw-bold text-white mb-3">
                  <span class="text-warning">Make</span> your day an Awesome
                  One!<span data-toggle="typed"
                    data-options='{"strings": ["Apps", "StartUp", "Company", "Portfolio"]}'></span>
                </h1>
                <p class="lead text-light">
                  Onekit is a Bootstrap 5 landing page template with a flat
                  design and fast loading. This template is perfect for
                  building awesome landing page sites. adventuring Now!.
                </p>
              </div>
              <a class="btn btn-white hover-button-up" href="#about">
                <!-- <i class="fas fa-desktop"></i> -->
                <svg class="bi bi-book me-2" width="1.2rem" height="1.2rem" viewBox="0 0 16 16" fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 018.5 2.5v11a.5.5 0 01-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 010 13.5v-11a.5.5 0 01.276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 01.22-.103 12.958 12.958 0 012.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 001 2.82z"
                    clip-rule="evenodd"></path>
                  <path fill-rule="evenodd"
                    d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 007.5 2.5v11a.5.5 0 00.854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0016 13.5v-11a.5.5 0 00-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 00-.799-.34 12.96 12.96 0 00-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0115 2.82z"
                    clip-rule="evenodd"></path>
                </svg>
                Get Started
              </a>
            </div>
          </div>

          <!-- hero image -->
          <div class="col-md-9 col-lg-6 align-self-center">
            <div class="px-3 px-sm-7 px-md-2 px-xl-7 mt-5 mt-lg-0 mb-n9" data-aos="fade-up" data-aos-delay="100">
              <img class="img-fluid animated-up-down" src="assets/img/start_up.svg" alt="images title" />
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>

      <!-- waves start -->
      <figure class="waves-bottom-center text-light-dark mb-lg-n4 z-index-n1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path class="opacity-20 translate-top-2" fill="currentColor" fill-opacity="1"
            d="M0,160L60,186.7C120,213,240,267,360,245.3C480,224,600,128,720,106.7C840,85,960,139,1080,149.3C1200,160,1320,128,1380,112L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
          </path>
          <path class="opacity-30 translate-top-1" fill="currentColor" fill-opacity="1"
            d="M0,160L60,186.7C120,213,240,267,360,245.3C480,224,600,128,720,106.7C840,85,960,139,1080,149.3C1200,160,1320,128,1380,112L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
          </path>
          <path fill="currentColor" fill-opacity="1"
            d="M0,160L60,186.7C120,213,240,267,360,245.3C480,224,600,128,720,106.7C840,85,960,139,1080,149.3C1200,160,1320,128,1380,112L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
          </path>
        </svg>
      </figure>
    </div>
    <!-- end hero -->

    <!-- =========={ PROFILE }==========  -->
    <div id="about" class="section py-6 py-md-7 bg-body">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-6" data-aos="fade-right">
            <!-- About 2 Thumb -->
            <div class="text-center">
              <div class="px-5 px-md-6 mb-5 mb-lg-0">
                <img class="img-fluid" src="assets/img/presentation2.svg" alt="company profile" />
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-aos="flip-up">
            <div class="py-0">
              <h2 class="fw-bold mb-3">Onekit Corporation</h2>
              <p class="lead mb-5">
                You will get all statistic from your business. Onekit tells
                you exactly what kind of financial information you need to
                enter and then it does all the calculations automatically
                using built-in formulas. Lorem Ipsum has been the industry's
                standard dummy.
              </p>
              <a href="#services" class="btn btn-warning">
                Our Services
                <svg class="bi bi-chevron-double-right ms-2" width=".8rem" height=".8rem" viewBox="0 0 16 16"
                  fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M3.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L9.293 8 3.646 2.354a.5.5 0 010-.708z"
                    clip-rule="evenodd"></path>
                  <path fill-rule="evenodd"
                    d="M7.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L13.293 8 7.646 2.354a.5.5 0 010-.708z"
                    clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End profile -->

    <!-- =========={ FEATURES }==========  -->
    <div id="features" class="section pt-5 pb-4 pb-md-5 bg-light-dark">
      <div class="container">
        <div class="position-relative">
          <!-- scribble -->
          <figure class="scribble scale-2 d-none d-md-block top-0 end-0 mt-md-n4 mt-lg-n7 me-lg-7 z-index-n1">
            <svg class="text-secondary opacity-90" width="76" height="72" viewBox="0 0 193.000000 184.000000"
              xmlns="http://www.w3.org/2000/svg">
              <g transform="translate(0.000000,184.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                <path d="M633 1723 c-3 -10 -19 -51 -35 -91 -33 -84 -34 -103 -10 -124 28 -24
                    53 -29 88 -18 35 12 55 48 48 91 -2 13 -6 46 -9 72 -9 69 -65 117 -82 70z"></path>
                <path d="M1330 1613 c-27 -54 -49 -107 -48 -117 5 -37 47 -55 111 -47 80 10
                    84 16 69 103 -15 85 -45 158 -66 158 -9 0 -36 -40 -66 -97z"></path>
                <path d="M973 1513 c-3 -10 -21 -54 -39 -98 -40 -95 -41 -109 -12 -129 29 -20
                    143 -22 151 -3 6 16 1 48 -19 139 -20 86 -65 137 -81 91z"></path>
                <path d="M261 1328 c-5 -13 -21 -49 -35 -81 -32 -72 -33 -92 -2 -113 32 -20
                    134 -10 144 14 10 28 -27 145 -55 174 -32 34 -41 35 -52 6z"></path>
                <path d="M605 1306 c-8 -19 -20 -66 -26 -106 -15 -91 -6 -103 79 -103 32 0 64
                    3 71 8 19 11 9 72 -23 142 -46 100 -77 118 -101 59z"></path>
                <path d="M1319 1253 c-7 -15 -29 -66 -50 -111 -22 -46 -39 -89 -39 -96 0 -7
                    11 -23 25 -36 22 -20 27 -22 55 -10 16 7 39 10 49 7 11 -3 28 1 37 8 16 11 17
                    21 6 111 -16 129 -57 192 -83 127z"></path>
                <path d="M1680 1058 c-5 -13 -25 -63 -45 -113 -20 -49 -38 -95 -41 -102 -5
                    -10 9 -27 48 -59 22 -18 124 -27 148 -14 18 9 21 18 17 43 -12 70 -48 204 -63
                    235 -20 38 -50 42 -64 10z"></path>
                <path d="M903 901 c-27 -81 -28 -92 -16 -116 9 -17 20 -25 30 -21 8 3 29 6 47
                    6 18 0 41 6 51 14 17 12 18 17 6 57 -54 181 -74 191 -118 60z"></path>
                <path d="M141 913 c-15 -30 -41 -125 -41 -153 0 -50 74 -87 114 -57 19 14 19
                    20 8 102 -11 86 -29 125 -58 125 -7 0 -17 -8 -23 -17z"></path>
                <path d="M1324 813 c-4 -16 -17 -49 -30 -75 -28 -56 -29 -75 -6 -105 15 -20
                    23 -21 67 -15 47 7 50 9 53 38 3 35 -24 152 -40 172 -17 20 -37 14 -44 -15z"></path>
                <path d="M537 688 c-20 -46 -37 -90 -37 -99 0 -22 26 -43 45 -35 8 3 15 1 15
                    -4 0 -15 43 -12 84 5 43 18 45 34 15 123 -19 57 -47 92 -74 92 -6 0 -28 -37
                    -48 -82z"></path>
                <path d="M995 620 c-7 -11 -55 -186 -55 -199 0 -17 42 -51 63 -51 42 0 96 21
                    101 38 6 19 -29 135 -58 190 -16 32 -39 41 -51 22z"></path>
                <path d="M1379 330 c-25 -77 -31 -105 -23 -118 11 -18 56 -36 116 -47 32 -6
                    36 -4 42 18 7 30 -20 180 -40 219 -10 18 -22 28 -38 28 -20 0 -27 -12 -57
                    -100z"></path>
                <path d="M566 290 c-20 -51 -30 -113 -22 -144 7 -29 49 -46 112 -46 44 0 44 0
                    44 35 0 40 -41 149 -67 177 -26 29 -49 22 -67 -22z"></path>
              </g>
            </svg>
          </figure>
        </div>

        <!-- section header -->
        <header class="text-center mx-auto mb-5">
          <h2 class="h3 fw-bold">Features</h2>
          <hr class="divider my-4 mx-auto bg-warning border-warning" />
          <p class="lead text-muted">
            Modern features that will make your project easier.
          </p>
        </header>

        <!-- row -->
        <div class="row text-center">
          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-bootstrap"></i> -->
                <svg class="bi bi-bootstrap" width="2.5rem" height="2.5rem" viewBox="0 0 16 16" fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M12 1H4a3 3 0 00-3 3v8a3 3 0 003 3h8a3 3 0 003-3V4a3 3 0 00-3-3zM4 0a4 4 0 00-4 4v8a4 4 0 004 4h8a4 4 0 004-4V4a4 4 0 00-4-4H4z"
                    clip-rule="evenodd"></path>
                  <path fill-rule="evenodd"
                    d="M8.537 12H5.062V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396zM6.375 4.658v2.467h1.558c1.16 0 1.764-.428 1.764-1.23 0-.78-.569-1.237-1.541-1.237H6.375zm1.898 6.229H6.375V8.162h1.822c1.236 0 1.887.463 1.887 1.348 0 .896-.627 1.377-1.811 1.377z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <h3 class="h5">Latest Bootstrap</h3>
              <p class="text-muted">
                Supported latest Bootstrap 5, most popular front-end component
                library.
              </p>
            </div>
            <!-- end service block -->
          </div>

          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up" data-aos-delay="100">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem"
                  enable-background="new 0 0 2459.5 2079.2" viewBox="0 0 2459.5 2079.2">
                  <path class="opacity-80"
                    d="m2177.5 1535.7h-830.9c-13.4 0-26.4 4.5-36.9 12.9l-619.2 492.3c-16 12.7-7 38.3 13.5 38.3h1483c146.6 0 278.4-131.6 268.1-289.9-9.4-144.4-132.4-253.6-277.6-253.6"
                    fill="currentColor" />
                  <path
                    d="m1505.3 1021.8c0-.7-.1-1.4-.2-2.2-4.6-74.2-39.5-146.3-102.9-195.8l-964-766.4c-117.7-92-288-71.3-380.4 46.1-92.4 117.5-71.8 287.2 45.8 379.2l698.9 555.6-698.9 555.6c-117.6 91.9-138.2 261.7-45.8 379.1s262.7 138.1 380.4 46.1l964.1-766.5c63.4-49.5 98.3-121.6 102.9-195.8.1-.7.1-1.4.2-2.2.3-5.5.4-10.9.4-16.4 0-5.4-.2-10.9-.5-16.4"
                    fill="currentColor" />
                  <path
                    d="m2459.5 1807.4c0 150.1-121.9 271.7-272.5 271.7-150.4 0-272.3-121.7-272.3-271.7s121.9-271.7 272.3-271.7c150.6 0 272.5 121.7 272.5 271.7"
                    fill="currentColor" />
                </svg>
              </div>
              <h3 class="h5">Google Web Vitals</h3>
              <p class="text-muted">
                Optimized by core web vital features from Google Web.Dev.
              </p>
            </div>
            <!-- end service block -->
          </div>

          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up" data-aos-delay="200">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-npm"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor"
                  viewBox="0 0 512 512">
                  <path
                    d="M32,32V480H480V32ZM272,380c0,43.61-25.76,64.87-63.05,64.87-33.68,0-53.23-17.44-63.15-38.49h0l34.28-20.75c6.61,11.73,11.63,21.65,26.06,21.65,12,0,21.86-5.41,21.86-26.46V240h44Zm99.35,63.87c-39.09,0-64.35-17.64-76.68-42h0L329,382c9,14.74,20.75,24.56,41.5,24.56,17.44,0,27.57-7.72,27.57-19.75,0-14.43-10.43-19.54-29.68-28l-10.52-4.52c-30.38-12.92-50.52-29.16-50.52-63.45,0-31.57,24.05-54.63,61.64-54.63,26.77,0,46,8.32,59.85,32.68L396,290c-7.22-12.93-15-18-27.06-18-12.33,0-20.15,7.82-20.15,18,0,12.63,7.82,17.74,25.86,25.56l10.52,4.51c35.79,15.34,55.94,31,55.94,66.16C441.12,424.13,411.35,443.87,371.35,443.87Z" />
                </svg>
              </div>
              <h3 class="h5">Vanilla Javascript</h3>
              <p class="text-muted">
                Template and major plugins using pure vanilla javascript.
              </p>
            </div>
            <!-- end service block -->
          </div>

          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-bootstrap"></i> -->
                <svg width="3rem" height="3rem" viewBox="0 0 16 16" fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 6a6 6 0 1112 0A6 6 0 010 6z"></path>
                  <path
                    d="M12.93 5h1.57a.5.5 0 01.5.5v9a.5.5 0 01-.5.5h-9a.5.5 0 01-.5-.5v-1.57a6.953 6.953 0 01-1-.22v1.79A1.5 1.5 0 005.5 16h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0014.5 4h-1.79c.097.324.17.658.22 1z">
                  </path>
                </svg>
              </div>
              <h3 class="h5">Pure Svg Icons</h3>
              <p class="text-muted">
                In default, we use pure svg icon. This is the icon for the
                modern web.
              </p>
            </div>
            <!-- end service block -->
          </div>

          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up" data-aos-delay="100">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="3rem"
                  viewBox=".06996735 .173 130.05906531 125.30503265" width="3rem">
                  <linearGradient id="a">
                    <stop offset="0" stop-color="currentColor" />
                    <stop offset="1" stop-color="currentColor" />
                  </linearGradient>
                  <linearGradient id="b" x1="38.056%" x2="69.819%" xlink:href="#a" y1="42.162%" y2="108.782%" />
                  <linearGradient id="c" x1="5.867%" x2="48.514%" xlink:href="#a" y1="1.842%" y2="100.616%" />
                  <linearGradient id="d" x1="11.804%" x2="51.371%" y1="-2.162%" y2="102.471%">
                    <stop offset="0" stop-color="#fff" stop-opacity=".549" />
                    <stop offset="1" stop-color="#fff" stop-opacity="0" />
                  </linearGradient>
                  <radialGradient id="e">
                    <stop offset="0" stop-color="#fff" />
                    <stop offset=".5" stop-color="currentColor" stop-opacity=".891" />
                    <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                  </radialGradient>
                  <g fill="none" fill-rule="evenodd">
                    <path d="m17.978 20.869h15.782v15.856h-15.782z" fill="#000" stroke="#000" stroke-width="2.902" />
                    <path
                      d="m10.515 28.673h109.169a9.5 9.5 0 0 1 9.52 9.52v76.84a9.5 9.5 0 0 1 -9.52 9.52h-109.169a9.5 9.5 0 0 1 -9.52-9.52v-76.84a9.5 9.5 0 0 1 9.52-9.52z"
                      fill="#000" stroke="#000" stroke-width="3.605" />
                    <g stroke="currentColor">
                      <path d="m17.978 20.869h15.782v15.856h-15.782z" fill="url(#b)" stroke-width="2.902" />
                      <g stroke-width="3.605">
                        <path
                          d="m10.515 28.673h109.169a9.5 9.5 0 0 1 9.52 9.52v76.84a9.5 9.5 0 0 1 -9.52 9.52h-109.169a9.5 9.5 0 0 1 -9.52-9.52v-76.84a9.5 9.5 0 0 1 9.52-9.52z"
                          fill="url(#c)" />
                        <path
                          d="m88.549 76.613c0 12.951-10.499 23.45-23.45 23.45-12.95 0-23.449-10.499-23.449-23.45 0-12.95 10.499-23.45 23.45-23.45 12.95 0 23.449 10.5 23.449 23.45z"
                          fill="#fff" fill-rule="nonzero" />
                      </g>
                    </g>
                    <path
                      d="m13.103 32.047h103.56c6.762 0 9.033 2.835 9.033 8.82v71.182c0 5.985-2.49 8.82-9.032 8.82h-103.561c-6.761 0-9.032-2.615-9.032-8.82v-71.182c0-6.644 2.93-8.82 9.032-8.82z"
                      stroke="url(#d)" stroke-linejoin="round" stroke-width="3.38" />
                    <circle class="opacity-80" cx="99.641" cy="24.934" fill="url(#e)" fill-rule="nonzero" r="24.761" />
                  </g>
                </svg>
              </div>
              <h3 class="h5">Webp Images</h3>
              <p class="text-muted">
                All png and jpg asset images are compressed to webp format.
              </p>
            </div>
            <!-- end service block -->
          </div>

          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up" data-aos-delay="200">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-html5"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor"
                  viewBox="0 0 512 512">
                  <polyline points="160 368 32 256 160 144" style="
                        fill: none;
                        stroke: currentColor;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-width: 32px;
                      " />
                  <polyline points="352 368 480 256 352 144" style="
                        fill: none;
                        stroke: currentColor;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-width: 32px;
                      " />
                  <line x1="304" y1="96" x2="208" y2="416" style="
                        fill: none;
                        stroke: currentColor;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-width: 32px;
                      " />
                </svg>
              </div>
              <h3 class="h5">Premium plugins</h3>
              <p class="text-muted">
                Included premium plugins Lightgallery, Isotope and Flickity.
              </p>
            </div>
            <!-- end service block -->
          </div>

          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-html5"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" viewBox="0 0 512 512">
                  <rect x="227.6" y="213.1" width="28.4" height="57.1" style="fill: currentColor"></rect>
                  <path
                    d="M0,156V327.4H142.2V356H256V327.4H512V156ZM142.2,298.9H113.8V213.2H85.3v85.7H28.4V184.6H142.2Zm142.2,0H227.5v28.6H170.6V184.6H284.4V298.9Zm199.2,0H455.2V213.2H426.8v85.7H398.4V213.2H370v85.7H313.1V184.6H483.8V298.9Z"
                    style="fill: currentColor"></path>
                </svg>
              </div>
              <h3 class="h5">NPM Software</h3>
              <p class="text-muted">
                Enjoy with the public registry tools you already love to use.
              </p>
            </div>
            <!-- end service block -->
          </div>

          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up" data-aos-delay="100">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-gulp"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" viewBox="0 0 256 512">
                  <path style="fill: currentColor"
                    d="M209.8 391.1l-14.1 24.6-4.6 80.2c0 8.9-28.3 16.1-63.1 16.1s-63.1-7.2-63.1-16.1l-5.8-79.4-14.9-25.4c41.2 17.3 126 16.7 165.6 0zm-196-253.3l13.6 125.5c5.9-20 20.8-47 40-55.2 6.3-2.7 12.7-2.7 18.7.9 5.2 3 9.6 9.3 10.1 11.8 1.2 6.5-2 9.1-4.5 9.1-3 0-5.3-4.6-6.8-7.3-4.1-7.3-10.3-7.6-16.9-2.8-6.9 5-12.9 13.4-17.1 20.7-5.1 8.8-9.4 18.5-12 28.2-1.5 5.6-2.9 14.6-.6 19.9 1 2.2 2.5 3.6 4.9 3.6 5 0 12.3-6.6 15.8-10.1 4.5-4.5 10.3-11.5 12.5-16l5.2-15.5c2.6-6.8 9.9-5.6 9.9 0 0 10.2-3.7 13.6-10 34.7-5.8 19.5-7.6 25.8-7.6 25.8-.7 2.8-3.4 7.5-6.3 7.5-1.2 0-2.1-.4-2.6-1.2-1-1.4-.9-5.3-.8-6.3.2-3.2 6.3-22.2 7.3-25.2-2 2.2-4.1 4.4-6.4 6.6-5.4 5.1-14.1 11.8-21.5 11.8-3.4 0-5.6-.9-7.7-2.4l7.6 79.6c2 5 39.2 17.1 88.2 17.1 49.1 0 86.3-12.2 88.2-17.1l10.9-94.6c-5.7 5.2-12.3 11.6-19.6 14.8-5.4 2.3-17.4 3.8-17.4-5.7 0-5.2 9.1-14.8 14.4-21.5 1.4-1.7 4.7-5.9 4.7-8.1 0-2.9-6-2.2-11.7 2.5-3.2 2.7-6.2 6.3-8.7 9.7-4.3 6-6.6 11.2-8.5 15.5-6.2 14.2-4.1 8.6-9.1 22-5 13.3-4.2 11.8-5.2 14-.9 1.9-2.2 3.5-4 4.5-1.9 1-4.5.9-6.1-.3-.9-.6-1.3-1.9-1.3-3.7 0-.9.1-1.8.3-2.7 1.5-6.1 7.8-18.1 15-34.3 1.6-3.7 1-2.6.8-2.3-6.2 6-10.9 8.9-14.4 10.5-5.8 2.6-13 2.6-14.5-4.1-.1-.4-.1-.8-.2-1.2-11.8 9.2-24.3 11.7-20-8.1-4.6 8.2-12.6 14.9-22.4 14.9-4.1 0-7.1-1.4-8.6-5.1-2.3-5.5 1.3-14.9 4.6-23.8 1.7-4.5 4-9.9 7.1-16.2 1.6-3.4 4.2-5.4 7.6-4.5.6.2 1.1.4 1.6.7 2.6 1.8 1.6 4.5.3 7.2-3.8 7.5-7.1 13-9.3 20.8-.9 3.3-2 9 1.5 9 2.4 0 4.7-.8 6.9-2.4 4.6-3.4 8.3-8.5 11.1-13.5 2-3.6 4.4-8.3 5.6-12.3.5-1.7 1.1-3.3 1.8-4.8 1.1-2.5 2.6-5.1 5.2-5.1 1.3 0 2.4.5 3.2 1.5 1.7 2.2 1.3 4.5.4 6.9-2 5.6-4.7 10.6-6.9 16.7-1.3 3.5-2.7 8-2.7 11.7 0 3.4 3.7 2.6 6.8 1.2 2.4-1.1 4.8-2.8 6.8-4.5 1.2-4.9.9-3.8 26.4-68.2 1.3-3.3 3.7-4.7 6.1-4.7 1.2 0 2.2.4 3.2 1.1 1.7 1.3 1.7 4.1 1 6.2-.7 1.9-.6 1.3-4.5 10.5-5.2 12.1-8.6 20.8-13.2 31.9-1.9 4.6-7.7 18.9-8.7 22.3-.6 2.2-1.3 5.8 1 5.8 5.4 0 19.3-13.1 23.1-17 .2-.3.5-.4.9-.6.6-1.9 1.2-3.7 1.7-5.5 1.4-3.8 2.7-8.2 5.3-11.3.8-1 1.7-1.6 2.7-1.6 2.8 0 4.2 1.2 4.2 4 0 1.1-.7 5.1-1.1 6.2 1.4-1.5 2.9-3 4.5-4.5 15-13.9 25.7-6.8 25.7.2 0 7.4-8.9 17.7-13.8 23.4-1.6 1.9-4.9 5.4-5 6.4 0 1.3.9 1.8 2.2 1.8 2 0 6.4-3.5 8-4.7 5-3.9 11.8-9.9 16.6-14.1l14.8-136.8c-30.5 17.1-197.6 17.2-228.3.2zm229.7-8.5c0 21-231.2 21-231.2 0 0-8.8 51.8-15.9 115.6-15.9 9 0 17.8.1 26.3.4l12.6-48.7L228.1.6c1.4-1.4 5.8-.2 9.9 3.5s6.6 7.9 5.3 9.3l-.1.1L185.9 74l-10 40.7c39.9 2.6 67.6 8.1 67.6 14.6zm-69.4 4.6c0-.8-.9-1.5-2.5-2.1l-.2.8c0 1.3-5 2.4-11.1 2.4s-11.1-1.1-11.1-2.4c0-.1 0-.2.1-.3l.2-.7c-1.8.6-3 1.4-3 2.3 0 2.1 6.2 3.7 13.7 3.7 7.7.1 13.9-1.6 13.9-3.7z" />
                </svg>
              </div>
              <h3 class="h5">Built with Gulp</h3>
              <p class="text-muted">
                Gulp making your project automatic and easy to running.
              </p>
            </div>
            <!-- end service block -->
          </div>

          <div class="col-md-6 col-lg-4 px-4 px-md-3" data-aos="fade-up" data-aos-delay="200">
            <!-- service block -->
            <div class="p-4 mb-5 rounded-3 bg-body shadow-sm hover-box-up">
              <div class="text-primary mb-3">
                <!-- icon -->
                <!-- <i class="fab fa-sass"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" viewBox="0 0 512 512">
                  <path style="fill: currentColor"
                    d="M511.78,328.07v0c-1.47-11.92-7.51-22.26-18-30.77a3.58,3.58,0,0,0-.43-.44l0,0-.53-.38-.17-.12-5.57-4-.19-.14-.71-.5,0,0a3.5,3.5,0,0,0-.83-.35c-17.62-10.49-46.79-17.84-91.42-2.09C383.28,271.36,382.07,257,389.2,235c1.27-3.83.09-6.36-3.71-8-7.64-3.25-18.1-1.59-25.52.37-3.46.9-5.54,2.86-6.2,5.83-4.7,22-18.36,42.1-31.57,61.5l-.78,1.14c-8.14-17.26-6.45-30.63-.78-47.38,1.13-3.34.24-5.56-2.89-7.22-8.74-4.51-21.85-1.41-27.07.13-6.62,1.93-13.72,19.82-21.65,41.24-2,5.39-3.72,10-4.75,12.15-2.45,5-4.79,10.7-7.27,16.75-5.6,13.69-11.91,29.1-20.93,38.78-3.28-7.25,1.88-18.68,6.89-29.77,5.93-13.11,11.53-25.5,5.08-33.41a11.82,11.82,0,0,0-8.33-4.32,13.26,13.26,0,0,0-6.15,1c.67-5.65.7-10.11-.95-15.5-2.36-7.69-8.49-12-16.93-11.77-19.22.56-35.48,14.88-45.75,26.8-6.84,8-22,14.1-35.31,19.45C129.37,305,124.37,307,120.2,309c-6.65-5.62-15.1-11.29-24-17.28-25-16.78-53.33-35.81-54.31-61.61-1.4-38.11,42-65.14,79.88-84.43,28.71-14.6,53.67-24.28,76.31-29.57,31.8-7.43,58.66-5.93,79.82,4.44,11.58,5.67,17,18,13.56,30.68-9,32.95-46.29,55.53-78.18,65.69-19.21,6.12-35.56,8.68-50,7.84-18.1-1.05-32.88-10.13-39.2-14a21.18,21.18,0,0,0-3.2-1.8l-.29-.07a3.21,3.21,0,0,0-3.19,1c-1.3,1.55-.84,4-.37,5.24,6.15,16.07,18.85,26.22,37.74,30.17a92.09,92.09,0,0,0,18.78,1.79c44.21,0,100.62-25.49,121.34-46.48,14.13-14.3,24.42-29,28.68-54.35,4.45-26.55-13.55-45-31.89-53.5-44.57-20.57-95.19-12.44-129.81-2-40.5,12.21-82.4,34.41-114.94,60.93-40.12,32.67-54.62,63-43.12,90.25,11.81,27.93,40.61,45.4,68.46,62.3,9,5.45,17.56,10.64,25.27,16-2.32,1.13-4.69,2.28-7.1,3.43C67.06,335,40.54,347.75,25.83,368.82c-10.68,15.35-12.68,30.63-5.94,45.42,3.6,7.87,10,13.21,18.89,15.87A50,50,0,0,0,53,432c17.31,0,36.36-7,46.73-13.47,18.32-11.5,30.19-26.94,35.29-45.89,4.54-16.86,3.45-33.61-3.15-48.56l22.45-11.32c-10.83,36-2.53,57.5,6.59,69.36,3.36,4.37,9.42,7,16.19,7.12s13-2.43,16.52-6.77c6.66-8.25,11.58-17.9,16.11-27.55-.24,6.3.06,12.68,2.21,18.09,1.93,4.87,5.11,8.1,9.21,9.34,4.36,1.33,9.47.21,14.39-3.15,22.17-15.17,37.33-51.58,49.51-80.85,1.73-4.16,3.39-8.16,5-11.9a152.5,152.5,0,0,0,12.5,31.07c1.18,2.14,1.08,3.08-.52,4.84-2.41,2.64-5.77,5.83-9.33,9.21-10.78,10.23-24.2,23-26,34.23-.7,4.5,2.4,8.6,7.21,9.53,14.47,2.88,31.9-1.33,46.64-11.25,13.4-9,18.44-21.55,15-37.19-3.33-15.06,4.27-33.76,22.59-55.62,3,12.53,7,22.66,12.52,31.53l-.15.12c-13.34,11.65-31.62,27.6-28.78,46.95a13.35,13.35,0,0,0,5.58,9.22,14.22,14.22,0,0,0,11.2,2.06c17.47-3.67,30.62-11.06,40.18-22.57s6.07-24.27,2.85-34.17c25-6.78,47.26-6.61,68.1.5,11.7,4,20.09,10.57,24.93,19.64,6.09,11.41,2.8,21.94-9.29,29.65-3.71,2.37-5.5,3.82-5.61,5.65a2.65,2.65,0,0,0,1,2.23c1.4,1.15,5.72,3.15,15.49-3,9-5.65,14.28-13.34,15.63-23A39,39,0,0,0,511.78,328.07ZM112.05,353.13l-.1,1.28c-1.56,14.64-9,27.4-22.15,38-8.26,6.66-17.23,10.75-25.25,11.53-5.6.54-9.67-.22-12.09-2.27-1.81-1.53-2.78-3.82-3-7-1.64-25.48,38.32-50.8,60.81-59.13A51.39,51.39,0,0,1,112.05,353.13ZM214.4,281.27h0c-3.7,21.09-14.49,60.9-31.45,76.35-.81.74-1.49,1-1.8.93s-.55-.44-.8-1c-5.66-13.12-3.57-35.28,5-52.69,6.59-13.42,16-22.31,26.52-25a5.29,5.29,0,0,1,1.34-.19,1.58,1.58,0,0,1,1,.27A1.64,1.64,0,0,1,214.4,281.27Zm83.49,76.88c-3.19,3.33-7.56,2.88-6.53,1.66l16.24-17.24C306.29,348.5,302.42,353.41,297.89,358.15Zm67.37-14.91a14.07,14.07,0,0,1-4.93,1.39c-.46-9.07,8.33-19.28,17-26.09C379.66,328,374.89,338,365.26,343.24Z" />
                </svg>
              </div>
              <h3 class="h5">Built with Sass</h3>
              <p class="text-muted">
                Change one variable from scss and the theme adapts.
              </p>
            </div>
            <!-- end service block -->
          </div>
        </div>
        <!-- end row -->
      </div>
    </div>
    <!-- End features -->
  </main>
  <!-- end main -->

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
      background-color: #0000004f;
      padding: 10px;
      border-radius: 5px;
      transform: .5s ease-in-out;
    }

    .d-none {
      display: none;
    }
  </style>

  <!-- =========={ FOOTER }==========  -->
  <footer class="bg-secondary">
    <!--Start footer copyright-->
    <div class="footer-dark">
      <div class="container py-4 border-top border-smooth">
        <div class="row">
          <div class="col-12 text-center">
            <p class="d-block my-3">
              Copyright &copy; Your Company | All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!--End footer copyright-->
  </footer>
  <!-- End Footer -->

  <!-- =========={ SCROLL TO TOP }==========  -->
  <a href="#top" class="p-3 border bg-body position-fixed end-1 bottom-1 z-index-10 back-top" title="Scroll To Top">
    <!-- <i class="fas fa-arrow-up"></i> -->
    <svg class="bi bi-arrow-up" width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor"
      xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
      <path fill-rule="evenodd"
        d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z"
        clip-rule="evenodd"></path>
    </svg>
  </a>

  <!-- Theme js -->
  <script src="assets/js/theme.js"></script>

  <!-- Bootstrap -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- JS Customized -->
  <script src="assets/js/login.js"></script>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



  <script>
    let uploadBtn = document.getElementById("file");
    let imageCont = document.querySelector(".img-cont");
    let choosenImage = document.getElementById("choosen-img");
    let fileName = document.getElementById("photo-name");
    console.log(uploadBtn);

    uploadBtn.addEventListener("change", () => {
      imageCont.style.display = "block";
      let reader = new FileReader();
      reader.readAsDataURL(uploadBtn.files[0]);
      console.log(uploadBtn.files[0].name);
      reader.onload = () => {
        choosenImage.setAttribute("src", reader.result);
      };
      fileName.textContent = uploadBtn.files[0].name;
    });
  </script>

  <!-- AJAX -->
  <script>

    $(document).on('submit', '#registerUser', function (e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("save_user", true);

      $.ajax({
        type: "POST",
        url: "src/register.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          var res = jQuery.parseJSON(response);
          console.log(res)
          if (res.status == 422) {
            $('#errorMessageReg').removeClass('d-none');
            $('#errorMessageReg').addClass('error');
            $('#errorMessageReg').text(res.message);

          } else if (res.status == 400) {
            $('#errorMessageReg').addClass('d-none');
            $('#signModal').css('display', 'none');
            $('#registerUser')[0].reset();
            $('#photo-name').text('');
            $('.alertMessageTop').removeClass('d-none');
            $('.alertMessageTop').text(res.message);

            setTimeout(function () {
              $('.alertMessageTop').addClass('d-none');
            }, 3000);
            setTimeout(function () {
              $('.alertMessageTop').text('');
              $('.alertMessageTop').removeClass('d-none');
            }, 3100);

          } else if (res.status == 450) {
            $('#errorMessageReg').removeClass('d-none');
            $('#errorMessageReg').addClass('error');
            $('#errorMessageReg').text(res.message);

          }
        }
      });

    });


    $(document).on('submit', '#loginUser', function (e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("login_user", true);

      $.ajax({
        type: "POST",
        url: "src/login.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          var res = JSON.parse(response);
          console.log(res);

          if (res.status == 422) {
            $('#errorMessage').removeClass('d-none');
            $('#errorMessage').addClass('error');
            $('#errorMessage').text(res.message);
          } else if (res.status == 400) {
            $('#errorMessage').removeClass('d-none');
            $('#errorMessage').removeClass('error');
            $('#errorMessage').addClass('success');
            $('#errorMessage').text(res.message)

            setTimeout(function () {
              $('#loginUser')[0].reset();
              $('#errorMessage').addClass('d-none');

            }, 1200);
            setTimeout(function () {
              window.location.href = res.redirect;

            }, 1000);


          }


        }
      });
    });







  </script>


</body>

</html>