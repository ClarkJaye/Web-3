<?php
session_start();

include_once('../../Included/dbconnect/connection.php');
$con = connection();

$userId = $_SESSION['userID'];


// Getting The USERS INFO
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM user WHERE userID = '$user_id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $res = [
            'status' => 200,
            'message' => 'Activity Fetch Successfully ',
            'data' => $user
        ];


        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Activity Not Found '
        ];
        echo json_encode($res);
        return false;
    }

}

// SET USER
if (isset($_POST['set_id'])) {
    $set_id = $_POST['set_id'];

    $sql = "SELECT * FROM `user` WHERE `userID` = '$set_id' ";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if ($row['status'] == "active") {
        $sql = "UPDATE `user` SET `status` = 'deactive' WHERE userID = '$set_id'";
        $result = $con->query($sql);

        $res = [
            'status' => 200,
            'message' => 'User Status changed to Deactivate Successfully'
        ];
        echo json_encode($res);
        return false;
    } else if ($row['status'] == "deactive") {
        $sql = "UPDATE `user` SET `status` = 'active' WHERE userID = '$set_id'";
        $result = $con->query($sql);

        $res = [
            'status' => 200,
            'message' => 'User Status changed to Activate Successfully'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'User Not Found'
        ];
        echo json_encode($res);
        return false;
    }
}


// Add Activity
if (isset($_POST['addAnnouncement'])) {
    $title = $_POST['nameAnnouncement'];
    $content = $_POST['contentAnnounce'];


    if ($title == NULL || $content == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Please Fill Up all the Fields '
        ];

        echo json_encode($res);
        return false;
    }

    $stmt = $con->prepare("INSERT INTO `announcements` (`title`, `content`,`admin_id`) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $content, $userId);

    if ($stmt->execute()) {
        $res = [
            'status' => 200,
            'message' => 'Announcement Added Successfully '
        ];
    } else {
        $res = [
            'status' => 500,
            'message' => 'Announcement Not Added '
        ];
    }

    echo json_encode($res);
}



?>