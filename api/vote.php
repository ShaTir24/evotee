<?php 
    session_start();
    include("connection.php");

    $votes = $_POST['gvotes'];
    $total_votes = $votes+1;
    $gid = $_POST['gid'];
    $uid = $_SESSION['userdata']['id'];

    $update_vote = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE id='$gid'");
    $update_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

    if($update_vote && $update_status) {
        $groups = mysqli_query($connect, "SELECT id, name, votes, photo FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups, MYSQL_ASSOC);   //stores records in a grouped manner into an object

        //maintaining session variables
        $_SESSION['userdata']['status'] = 1;  //updating status of the user 
        $_SESSION['groupsdata'] = $groupsdata;
        echo "
            <script>
                alert('Vote Casting Successfull!');
                window.location ='../routes/dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Some Error Occurred in casting the vote!\nPlease Try after some time.');
                window.location ='../routes/dashboard.php';
            </script>
        ";
    }
?>