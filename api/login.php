<?php
    //session is used to access the data within the entire project
    session_start();
    //establishing connection to the database
    include("connect.php");

    //getting form values
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    //writing query to check if the user exists
    $check = mysqli_query($connect, "SELECT * FROM user 
        WHERE mobile = '$mobile' AND password = '$pass' AND role = '$role' ");

    if(mysqli_num_rows($check) > 0) {
        //fetching user data
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect, "SELECT * FROM user WHERE role = 2");
        $groupsdata = mysqli_fetch_all($groups, MYSQL_ASSOC);   //stores records in a grouped manner into an object

        //maintaining session variables
        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupsdata'] = $groupsdata;

        echo "
            <script>
                window.location ='../routes/dashboard.php';
            </script>
        ";

    } else {
        echo "
            <script>
                alert('No such User Found!\nPlease use Valid Credentials');
                window.location ='../';
            </script>
        ";
    }
?>