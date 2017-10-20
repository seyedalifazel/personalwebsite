<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 10/13/2017
 * Time: 5:53 AM
 */
require_once "publics.php";
$ip = $_SERVER['REMOTE_ADDR'];
if (filter_var("$ip", FILTER_VALIDATE_IP)) {
    $sign = $_POST['sign'];
    $conn = getDBConnection();
    if ($sign == "sign-up") {
        $firstName = check_data($_POST['firstName']);
        $lastName = check_data($_POST['lastName']);
        $email = check_data($_POST['email']);
        $phoneNumber = check_data($_POST['phoneNumber']);
        if (!empty($firstName) & !empty($lastName) & !empty($email) & !empty($phoneNumber)) {
            if (filter_var("$email", FILTER_VALIDATE_EMAIL)) {
                $sql = "INSERT INTO signUp (firstName,lastName,email,phoneNumber) VALUES ('$firstName','$lastName','$email','$phoneNumber')";
                mysqli_query($conn, $sql);
                mysqli_error($conn);
            } else {
                header("refresh:8;url=../index.html");
                echo "Your Email is not valid please try again";
            }
        } else {
            header("refresh:8;url=../index.html");
            echo "please complete all of field";
        }
    }
    if ($sign == "sign-in") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'admin' && $password == 'admin') {
            echo <<<EOF
    <table border="1" align="center">
     <tr>
        <td>Name :</td>
        <td>$name</td>
     </tr>
     <tr>    
        <td>Family :</td>
        <td>$family</td>
     </tr>
    </table>
EOF;

        }
    }
} else {
    die("Your ip is not valid");
}
