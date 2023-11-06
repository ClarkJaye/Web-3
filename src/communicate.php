<?php
session_start();

include_once('../Included/dbconnect/connection.php');
$con = connection();


$userId = $_SESSION['userID'];


// ADD Friends
if (isset($_POST['friendId'])) {
    // Retrieve the sender and receiver IDs from the AJAX request
    $senderId = $userId;
    $receiverId = $_POST['friendId'];

    // Check if the friend request already exists
    $sqlCheckRequest = "SELECT * FROM friend_requests WHERE sender_id = '$senderId' AND receiver_id = '$receiverId'";
    $resultCheckRequest = $con->query($sqlCheckRequest);

    if ($resultCheckRequest->num_rows > 0) {
        $res = array('success' => false, 'message' => 'Friend request already sent');
    } else {
        // Insert the friend request into the `friend_requests` table
        $sqlInsertRequest = "INSERT INTO friend_requests (sender_id, receiver_id, status) VALUES ('$senderId', '$receiverId', 'pending')";
        if ($con->query($sqlInsertRequest) === TRUE) {
            $res = [
                'status' => 200,
                'message' => 'Friend request sent Successfully ',
                'text' => 'request sent'
            ];
        } else {
            $res = [
                'status' => 500,
                'message' => 'Friend request not failed '
            ];
        }
    }

    echo json_encode($res);
    return false;

}

// Accept Friend Request
if (isset($_POST['friendRequestId'])) {
    $friendRequestId = $_POST['friendRequestId'];

    // Update the friend request status to 'accepted'
    $sqlUpdateRequest = "UPDATE friend_requests SET status = 'accepted' WHERE sender_id = '$friendRequestId'";
    if ($con->query($sqlUpdateRequest) === TRUE) {
        // Retrieve the sender and receiver IDs from the friend request record
        $sqlGetFriendRequest = "SELECT sender_id, receiver_id FROM friend_requests WHERE sender_id = '$friendRequestId'";
        $resultGetFriendRequest = $con->query($sqlGetFriendRequest);
        $rowGetFriendRequest = $resultGetFriendRequest->fetch_assoc();
        $senderId = $rowGetFriendRequest['sender_id'];
        $receiverId = $rowGetFriendRequest['receiver_id'];

        // Check if the friendship record already exists
        $sqlCheckFriendship = "SELECT * FROM friends WHERE (user1_id = '$senderId' AND user2_id = '$receiverId') OR (user1_id = '$receiverId' AND user2_id = '$senderId')";
        $resultCheckFriendship = $con->query($sqlCheckFriendship);
        if ($resultCheckFriendship && $resultCheckFriendship->num_rows > 0) {
            // Friendship record already exists
            $res = [
                'status' => 404,
                'message' => 'Friend request already accepted successfully'
            ];
        } else {
            // Create a new friendship record
            $sqlInsertFriendship = "INSERT INTO friends (user1_id, user2_id, status) VALUES ('$senderId', '$receiverId', 'accepted')";
            if ($con->query($sqlInsertFriendship) === TRUE) {
                $res = [
                    'status' => 200,
                    'message' => 'Friend request accepted successfully'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to create friendship'
                ];
            }
        }
    } else {
        $res = [
            'status' => 500,
            'message' => 'Failed to accept friend request'
        ];
    }

    echo json_encode($res);
    return false;
}

// Delete
if (isset($_POST['delete_act'])) {
    $act_id = $_POST['delete_act'];

    $sql = "DELETE FROM activities WHERE id = '$act_id'";
    $result = $con->query($sql);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Activity Delete Successfully '
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Activity Not Deleted '
        ];
        echo json_encode($res);
        return false;
    }

}


// Add Activity
if (isset($_POST['add_activity'])) {
    $activityName = $_POST['nameActivity'];
    $location = $_POST['location'];
    $date = date("m/d/Y", strtotime($_POST['date']));
    $time = date("h:i A", strtotime($_POST['time']));
    $activityImg = $_FILES['image']['name'];

    if ($activityName == NULL || $location == NULL || $date == NULL || $time == NULL || empty($activityImg)) {
        $res = [
            'status' => 422,
            'message' => 'Please Fill Up all the Fields '
        ];

        echo json_encode($res);
        return false;
    }

    $stmt = $con->prepare("INSERT INTO `activities` (`activityName`, `location`, `dateOfActivity`, `timeOfActivity`,
`image`, `userID`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $activityName, $location, $date, $time, $activityImg, $userId);

    if ($stmt->execute()) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../activity_savedpictures/" . $activityImg);
        $res = [
            'status' => 200,
            'message' => 'Activity Added Successfully '
        ];
    } else {
        $res = [
            'status' => 500,
            'message' => 'Activity Not Added '
        ];
    }

    echo json_encode($res);
}

// Edit/View Activity
if (isset($_GET['act_id'])) {
    $act_id = $_GET['act_id'];

    $sql = "SELECT * FROM activities WHERE id = '$act_id' AND userID = '$userId'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $activity = $result->fetch_assoc();

        $res = [
            'status' => 200,
            'message' => 'Activity Fetch Successfully ',
            'data' => $activity
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

// Set Activity
if (isset($_POST['set_activity'])) {
    $activityId = $_POST['setId'];
    $remarks = $_POST['setRemarks'];
    $status = 'done';
    
    $sql = "SELECT * FROM activities WHERE id = '$activityId' AND userID = '$userId'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();


    if (empty($remarks)) {

        $res = [
            'status' => 422,
            'message' => 'Please Enter a remarks '
        ];

        echo json_encode($res);
        return false;
    }

    $stmt = $con->prepare("UPDATE `activities` SET `remarks` = ?, `status` = ?, userId = ? WHERE `id` = $activityId");
    $stmt->bind_param("ssi", $remarks, $status, $userId);

    if ($stmt->execute()) {
        $res = [
            'status' => 200,
            'message' => 'Activity Add Remarks Successfully '
        ];
    } else {
        $res = [
            'status' => 500,
            'message' => 'Remarks not Added '
        ];
    }

    echo json_encode($res);
}



// Update Activity
if (isset($_POST['update_activity'])) {
    $activityId = $_POST['editId'];
    $activityName = $_POST['nameActivity'];
    $location = $_POST['location'];
    $date = date("m/d/Y", strtotime($_POST['date']));
    $time = date("h:i A", strtotime($_POST['time']));
    $activityImg = $_FILES['updateImg']['name'];

    $sql = "SELECT * FROM activities WHERE id = '$activityId' AND userID = '$userId'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();


    if (empty($activityName) || empty($location) || empty($date) || empty($time) || empty($activityImg)) {
        // if (
// $row['activityName'] == $activityName || $location == $row['location'] ||
// $date == $row['dateOfActivity'] || $time == $row['timeOfActivity'] ||
// $activityImg == $row['image']
// ) {

        $res = [
            'status' => 422,
            'message' => 'Please fill all the fields. '
            // 'message' => 'Activity No Changes '
        ];

        echo json_encode($res);
        return false;
    }

    $stmt = $con->prepare("UPDATE `activities` SET `activityName` = ?, `location` = ?, `dateOfActivity` = ?,
`timeOfActivity` = ?, `image` = ?, userId = ? WHERE `id` = $activityId");
    $stmt->bind_param("sssssi", $activityName, $location, $date, $time, $activityImg, $userId);

    if ($stmt->execute()) {
        move_uploaded_file($_FILES["updateImg"]["tmp_name"], "../activity_savedpictures/" . $activityImg);
        $res = [
            'status' => 200,
            'message' => 'Activity Updated Successfully '
        ];
    } else {
        $res = [
            'status' => 500,
            'message' => 'Activity Not Update '
        ];
    }

    echo json_encode($res);
}






?>