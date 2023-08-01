<?php
session_start();
//enables to open the dashboard page only when user has logged in
// if(!isset($_SESSION['userdata'])) {
//     header("location: ../");
// }

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status'] == 0) {
    $status = '<b style="color: red"> Not Yet Voted</b>';
} else {
    $status = '<b style="color: green"> Already Voted</b>';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | eVotee</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        #back {
            float: left;
            margin-left: 2%;
        }

        #logout {
            float: right;
            margin-right: 2%;
        }

        #profile {
            padding: 2%;
            background-color: rgba(235, 244, 252, 0.527);
            border-radius: 10px;
            width: 35%;
            float: left;
            text-align: left;
        }
        #group {
            padding: 2%;
            background-color: rgba(235, 244, 252, 0.527);
            border-radius: 10px;
            width: 55%;
            float: right;
            text-align: left;
        }
    </style>
</head>

<body>
    <div id="main_page">
        <div id="header_section">
            <h1>eVotee</h1>
            <a href = "../"><button class="btn" id="back">Back</button></a>
            <a href = "login.php"><button class="btn" id="logout">Logout</button></a>
            <h2>Online Voting System</h2>
        </div>
        <hr>
        <h2>Dashboard</h2>
        <div class="content_section" style="padding: 2%">
            <div id="profile">
                <img src="../uploads/<?php echo $userdata['photo'] ?>" height="150px" width="150px" />
                <br><br>
                <b>Name:    <?php echo $userdata['fname'] + $userdata['lname'] ?>
                </b>
                <br><br>
                <b>Mobile:  <?php echo $userdata['mobile'] ?>
                </b>
                <br><br>
                <b>Address: <?php echo $userdata['address'] ?>
                </b>
                <br><br>
                <b>Status:  <?php echo $status ?>
                </b>
                <br><br>
            </div>
            <div id="group">
                <?php 
                    if($_SESSION['groupsdata']) {
                        for($i = 0; $i < count($groupsdata); $i++) {
                            ?>
                            <div>
                                <img src="../uploads/<?php echo $groupsdata[$i]['photo']?>" alt="Group Logo" height="150px", width="150px"/>
                                <b>Group Name: <?php echo $groupsdata[$i]['fname'] + $groupsdata[$i]['lname'] ?></b>
                                <br><br>
                                <b>Votes: <?php echo $groupsdata[$i]['votes'] ?></b>
                                <br><br>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>"/>
                                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>"/>
                                    <?php 
                                        if($_SESSION['userdata']['status']==0) {
                                            ?>
                                            <input type="submit" name="votebtn" value="vote" id="votebtn"/>
                                            <br><br>
                                            <?php
                                        } else {
                                            ?>
                                            <input type="submit" name="votebtn" value="vote" disabled="true" style="background_color: green"/>
                                            <br><br>
                                            <?php
                                        }
                                    ?>
                                </form>
                            </div>
                            <hr>
                            <?php
                        }
                    } else {
                        echo "
                            <script>
                                alert('No Groups Present To Vote!');
                            </script>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>

</body>

</html>