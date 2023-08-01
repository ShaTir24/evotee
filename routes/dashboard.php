<?php
session_start();
//enables to open the dashboard page only when user has logged in
if(!isset($_SESSION['userdata'])) {
    header("location: ../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];
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

        #people {
            padding: 2%;
            background-color: rgba(235, 244, 252, 0.527);
            border-radius: 10px;
            width: 40%;
            float: left;
            text-align: left;
        }
        #group {
            padding: 2%;
            background-color: rgba(235, 244, 252, 0.527);
            border-radius: 10px;
            width: 60%;
            float: right;
            text-align: justify;
        }
    </style>
</head>

<body>
    <div id="main_page">
        <div id="header_section">
            <h1>eVotee</h1>
            <button class="btn" id="back">Back</button>
            <button class="btn" id="logout">Logout</button>
            <h2>Online Voting System</h2>
        </div>
        <hr>
        <h2>Dashboard</h2>
        <div id="profile">
                <img src="../uploads/<?php echo $userdata['photo'] ?>" height="150px" width="150px" />
            <br><br>
            <b>Name:    <?php echo $userdata['fname'] ?> <?php echo $userdata['lname'] ?>
            </b>
            <br><br>
            <b>Mobile:  <?php echo $userdata['mobile'] ?>
            </b>
            <br><br>
            <b>Address: <?php echo $userdata['address'] ?>
            </b>
            <br><br>
            <b>Status:  <?php echo $userdata['status'] ?>
            </b>
            <br><br>
        </div>
        <div id="group">
            <?php 
                if($_SESSION['groupsdata']) {
                    for($i = 0; $i < count($groupsdata); $i++) {
                        ?>
                        <div>
                            <b>Group Name: </b>
                            <b>Votes: </b>
                            <form action="#">

                            </form>
                        </div>
                        <?php
                    }
                } else {

                }
            ?>
        </div>
    </div>

</body>

</html>