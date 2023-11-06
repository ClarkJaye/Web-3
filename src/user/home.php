<?php include_once('user-header.php') ?>


<section class="home-grid" id="home">

    <h1 class="heading">Home Feed</h1>

    <style>
        .cards {
            grid-template-columns: none;
        }

        .cards .card {
            width: 50%;
            margin: auto;
            display: block;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10px;
        }

        .card-header .post-profile-pictur,
        .post-profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer;
        }

        .card-header .card-header-text {
            display: flex;
            flex-direction: column;
            color: var(--black);

        }

        .post-author {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            text-align: left;
        }

        .post-timestamp {
            margin: 0;
            font-size: 12px;
        }

        .time-post {
            display: flex;
            align-items: center;
            padding-top: 2px;
        }

        .time-post p {
            padding-right: 5px;
        }

        .post-option {
            display: flex;
            align-items: center;
            margin-top: -20px;
            margin-left: auto;
            gap: 10px;
            font-size: 22px;

        }

        .post-body {
            padding-left: 5px;
            color: #e0dddf;
        }


        .more-option {
            padding: 8px;
            border-radius: 5px;
            position: relative;
        }

        .more-option:hover {
            background-color: #e0dddf;
            cursor: pointer;
            color: var(--white);

        }

        .more-option i {
            font-size: 20px;
            color: var(--black);
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            padding: 4px;
            top: 38px;
            right: 0;
            background: var(--black);
            border-radius: 5px;
        }

        .dropdown-menu a {
            display: block;
            font-size: 14px;
            padding: 5px;
            color: var(--white);
            text-decoration: none;
        }

        .dropdown-menu a:hover {
            background-color: var(--hover);
        }

        /* card Body */
        .post-body {
            padding: 10px;
        }

        .post-body .cont {
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-gap: 10px;
            height: 250px;
        }

        .post-body .left {
            padding: 10px 0;
        }

        .post-body .left h4 {
            margin-top: 1rem;
        }

        .post-body .left span {
            color: var(--black);
            font-size: 17px;
        }

        .post-body .right {
            height: 200px;
            width: 100%;
        }

        .post-body .right .img-cont {
            width: 200px;
            height: 200px;
        }

        .post-body .right .img-cont img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;

        }

        .reactions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 10px 10px 10px;
            color: #a0a0a0;
        }

        .reactions img {
            height: 20px;
            width: 20px;
            cursor: pointer;
        }

        .reactions i,
        .reactions p {
            cursor: pointer;
        }

        .comments {
            font-size: 14px;
            display: flex;
            justify-content: flex-end;
        }

        .reactions .comments:hover {
            text-decoration: underline;
        }

        .post-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            border-top: 1px solid #cecdce7a;
        }


        .post-like-button,
        .post-comment-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: var(--black);
        }

        .post-like-button.active {
            color: rgb(60, 131, 224);
        }


        .post-actions .postbtn {
            padding: 10px 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 5px;
            border-radius: 5px;
        }

        .post-actions .postbtn:hover {
            background: #e0dddf;
            cursor: pointer;

        }


        /*---------- Comment Styling ------*/

        .comments-cont {
            padding: 10px;
            border-top: 1px solid #cecdce7a;
            max-height: 230px;
            overflow-y: auto;
            scroll-behavior: smooth;
        }

        .add-comment {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            box-shadow: 0px 0px 1px 0px #888888;
        }

        .add-comment img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer;
        }

        .add-comment input {
            width: 100%;
            font-size: 16px;
            padding: 10px;
            border: 0;
            outline: none;
            background: var(--light-bg);
            color: var(---black);
            border-radius: 20px;
            font-size: 17px;
        }

        .add-comment input:focus {
            background: #d5d5d5;
        }

        .add-comment button {
            font-size: 16px;
            padding: 10px;
            margin-left: 10px;
            border-radius: 5px;
            color: #fff;
            background: #2374e1;
            border: none;
            cursor: pointer;
            outline: none;
        }

        .add-comment button:hover {
            background: #2375e1d2;
        }

        .comments-list {
            margin: 10px 0px;

        }

        .comment-posted {
            padding-top: 10px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .comment-posted img {
            cursor: pointer;
        }

        .comment-details {
            background: var(--light-bg);
            color: var(--black);
            padding: 10px;
            border-radius: 10px;
        }

        .delete-comment {
            font-size: 20px;
            color: #cecdce;
            margin: 5px;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
        }

        .delete-comment:hover {
            background: #81818183;
        }

        .postbtn i {
            font-size: 16px;
            margin-right: 5px;

        }
    </style>


    <div class="main">
        <div class="cards">

            <div class="card">
                <div class="card-header">
                    <img src="../../User_img/pic-1.jpg" alt="Profile Picture" class="post-profile-picture">

                    <div class="card-header-text">
                        <p class="post-author">Jay Clark Anore </p>
                        <div class="time-post">
                            <p class="post-timestamp">2hr</p>
                            <p> •<span class="fas fa-earth"></span></p>
                        </div>
                    </div>
                    <div class="post-option">
                        <div class="more-option" onclick="showDropdown()">
                            <i class="fas fa-ellipsis"></i>
                            <div class="dropdown-menu">
                                <a id="edit-post" href="#">Edit</a>
                                <a id="remove-post" href="#">Delete</a>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="post-body">
                    <div class="cont">
                        <div class="left">
                            <div class="card-name">
                                <h4>Activity Name :</h4>
                                <span>Plasu</span>
                            </div>
                            <div class="card-name">
                                <h4> Location :</h4>
                                <span>Babag LLC</span>
                            </div>
                            <div class="card-name">
                                <h4> Date :</h4>
                                <span>10/15/2023</span>
                            </div>
                            <div class="card-name">
                                <h4> Time :</h4>
                                <span>04:00 PM</span>
                            </div>

                        </div>
                        <div class="right">
                            <div class="card-name">OOTD :</div>
                            <div class="img-cont">
                                <img src="../../assets/img/profile-img.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="post-actions">
                    <div class="postbtn like">
                        <button class="post-like-button"><i class="fa fa-thumbs-up"></i>Like</button>
                    </div>
                    <div class="postbtn">
                        <button class="post-comment-button"><i class="fa fa-comment"></i>Comment</button>
                    </div>

                </div>

                <!-- Comments -->
                <div class="comments-cont">

                    <div class="comments-list">
                        <div class="comment-posted">
                            <img src="../../assets/img/profile-img.jpg" class="post-profile-picture comment-profile">

                            <div class="comment-details">
                                <h5>Jay Clark Anore</h5>
                                <p>Hello..</p>
                            </div>
                            <div class="delete-comment">
                                <i class="fas fa-xmark"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Comment -->
                <div class="add-comment">
                    <img src="../../assets/img/profile-img.jpg">
                    <input id="commentInput" type="text" placeholder="Write a comment">
                    <button id="comment-btn">Comment</button>
                </div>



            </div>



        </div>


    </div>


</section>


<?php include_once('user-footer.php') ?>