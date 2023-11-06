<?php
session_start();

include_once("../Included/dbconnect/connection.php");
$con = connection();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE email = '".$email."' and password = '".$password."'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['login_user'])) {
    if ($row !== null && $row["email"] == $email && $row["password"] == $password) {
        if ($row["role"] == "admin") {
            $res = [
                'status' => 400,
                'message' => 'Admin login successful',
                'redirect' => 'src/admin/dashboard.php'
            ];
            echo json_encode($res);
        } else if ($row["role"] == "user") {
            $res = [
                'status' => 400,
                'message' => 'User login successful',
                'redirect' => 'src/user/dashboard.php'
            ];
            echo json_encode($res);
        }

        $_SESSION['userID'] = $row['userID'];
        $_SESSION['Role'] = $row['role'];

    } else {
        $res = [
            'status' => 422,
            'message' => 'Invalid email or password'
        ];
        echo json_encode($res);
    }
}
?>