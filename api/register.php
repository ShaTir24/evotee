<?php
    include("connect.php");

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];
    $addr = $_POST['address'];
    $mobile = $_POST['mobile'];
    $role = $_POST['role'];

    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    if($pass == $conf_pass) {
        move_uploaded_file($tmp_name, "../uploads/$photo");
        $insert = mysqli_query($connect, "INSERT INTO user (
            fname,
            lname,
            mobile,
            address,
            password,
            photo,
            role,
            status,
            votes
        ) VALUES(
            '$fname',
            '$lname',
            '$mobile',
            '$addr',
            '$pass',
            '$photo',
            '$role',
            0,
            0
        )");

        if($insert) {
            echo "
            <script>
                alert('Registration Successfull!');
                window.location ='../';
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Some Error Occurred in Registration!');
                window.location ='../routes/register.html';
            </script>
        ";
        }
    } else {
        echo "
            <script>
                alert('Password Does not Match!');
                window.location ='../routes/register.html';
            </script>
        ";
    }
?>