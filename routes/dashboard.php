<?php
    session_start();
    //enables to open the dashboard page only when user has logged in
    if(!isset($_SESSION['userdata'])) {
        header("location: ../");
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | eVotee</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="header_section">
        <h1>eVotee</h1>
        <nav>
                <button>Back</button>
                <button>Logout</button>
        </nav>
        <h2>Online Voting System</h2>
    </div>
    <hr>
    <h2>Dashboard</h2>
    <div id="profile"></div>
    <div id="group"></div>
</body>

</html>