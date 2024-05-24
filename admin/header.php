<?php

session_start();
if (isset($_SESSION['isLogin']) && isset($_SESSION['Username'])) {
    $Username = $_SESSION['Username'];
}else{
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ScreenTouch</title>
        <link rel="icon" href="../images/logo-sm.png" sizes="32x32" />
        <link rel="icon" href="../images/logo-sm.png" sizes="192x192" />


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

         <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
        
        <!-- DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    
      
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>

<style>
       
       .list-container {
            margin-bottom: 20px;
        }
        .list-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        ul, ol {
            margin: 0;
            padding: 0 0 0 20px;
        }

        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5); /* Optional: Darker background for the backdrop */
        }

        li {
            padding-top:5px;
        }
    </style>


<nav class="navbar navbar-default" style="padding:15px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="../images/logo.png" id="icon" alt="logo" width="25%" height="25%" />
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li id="homeMenu" name="menuIcon"><a href="dashboard.php">Home</a></li>
        <li id="ksflMenu" name="menuIcon"><a href="KSFL.php">KSFL</a></li>
        <li id="kmvlMenu" name="menuIcon"><a href="#">KMVL</a></li>
        <li id="contactMenu" name="menuIcon"><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>