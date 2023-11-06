<?php
session_start();

include_once('../Included/dbconnect/connection.php');

$con = connection();

if (isset($_POST['save_user'])) {
    if ($_POST['password'] == $_POST['confirm-password']) {

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profileImg = $_FILES['profileImg']['name'];
        $role = 'user';
        $status = 'active';

        if (
            $fname == null || $lname == null || $gender == null || $address == null ||
            $email == null || $password == null || empty($profileImg)
        ) {
            $res = [
                'status' => 422,
                'message' => 'Please Fill Up all the Fields '
            ];
            echo json_encode($res);
            return false;
        }

        // Check if email already exists
        $emailExist = "SELECT COUNT(*) as emailCount FROM user WHERE email = '$email'";
        $emailResult = $con->query($emailExist);
        $emailRow = $emailResult->fetch_assoc();

        if ($emailRow['emailCount'] > 0) {
            $res = [
                'status' => 450,
                'message' => 'Email already Existed'
            ];
            echo json_encode($res);
            return false;
        }

        // Prepare and bind the values to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO `user` (`firstName`, `lastName`, `gender`, `address`, `email`, `password`, `profile_img`, `role`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $fname, $lname, $gender, $address, $email, $password, $profileImg, $role, $status);

        if ($stmt->execute()) {
            move_uploaded_file($_FILES["profileImg"]["tmp_name"], "../User_Img/" . $_FILES['profileImg']['name']);

            $sql = "SELECT * FROM user WHERE email = '" . $email . "' and password = '" . $password . "'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            $res = [
                'status' => 400,
                'message' => 'User Registered Successfully, You can Login now'
          
                // 'userID' => $row['userID'],
                // 'Role' => $row['role'],
            ];
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['Role'] = $row['role'];

            echo json_encode($res);

            return false;


        } else {
            $res = [
                'status' => 500,
                'message' => 'User Not Created '
            ];
            echo json_encode($res);
            return false;

        }


    } else {
        $res = [
            'status' => 422,
            'message' => 'Password not match'
        ];
        echo json_encode($res);
        return false;
    }

}





?>