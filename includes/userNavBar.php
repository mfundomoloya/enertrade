<?php

    include_once '../DATABASE/dbConnect.php';

    //checking if there is a session running then if there is no session start the session
    if(session_status() == PHP_SESSION_NONE){
      include_once '../DATABASE/session.php';
    }
    include_once("../pages/setAlarms.php");  
?>
<?php 

    // Connect to the database
    // $conn = mysqli_connect("localhost", "root", "", "chicken_bot");

    // Get the logged in user's ID from the session
    $username = "";//$_SESSION['username'];

    // Query the database for the username associated with the user ID
    $sql = "SELECT * FROM user WHERE email = '{$_SESSION['email']}'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and retrieve the username
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        $username = $row[1];
        $email = $row[2];
        $id = $row[0];
        $profilePic = $row[5];
        
        
    } else {
        echo "Error: could not retrieve username from database.";
    }

    // Close the database connection
    //mysqli_close($conn);
?>

<?php
    if (!empty($profilePic)) {
        $proPicPath = $username.$id.'Profile.jpg';    
    }else{
        $proPicPath = 'noProfile.jpg';
    } 
?>


  <head>
      <title> CHICKEN  BOT</title>
      <link rel="shortcut icon" type="image/png" href="../images/logo.png">
      
      <meta charset ="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!--JAVA_SCRIPT-->
      <script src="https://kit.fontawesome.com/a035f24907.js" crossorigin="anonymous"></script>

      <!-- JAVASCRIPT MEDIA TAGS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jsmediatags/3.9.5/jsmediatags.js" integrity="sha512-fCU+rmH3nS/RJaTSl/ylo/PxwWIZwJts3rfxRylSPqGYMJGPLXvPJGOTF+ECb0K5m9rSXbkCNg2PR7WKGWRTVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jsmediatags/3.9.5/jsmediatags.min.js" integrity="sha512-YsR46MmyChktsyMMou+Bs74oCa/CDdwft7rJ5wlnmDzMj1mzqncsfJamEEf99Nk7IB0JpTMo5hS8rxB49FUktQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <!--bootstrap javascript-->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      
      <!-- Charts CDNS javascript -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      <!-- multiple form select links -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

      <!--CSS-->
          <!--Bootstrap CSS-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      
      <!-- FOR PRIMTING EXCEL DOCUMENTS -->
      <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
      <script src="../js/FileSaver.js"></script>

      <!-- FOR PDF -->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" defer></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>



      <!--BoxiIconS CSS-->
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


      <!--my CSS-->
      <link rel="stylesheet" type="text/css" href="../css/style.css">



          
    </head>
  
  <body>
    <div class="sidebar">
      <div class="logo_details">
        <i class="bx bx-bot icon"></i>
        <div class="logo_name">CHICKEN BOT</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>

      <!--Navigation list-->
      <ul class="nav-list">
        <li>
          <i class="bx bx-search"></i>
          <input type="text" placeholder="Search...">
          <span class="tooltip">Search</span>
        </li>
        <li>
          <a href="userDashB.php">
            <i class="bx bxs-dashboard"></i>
            <span class="link_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="alarm.php">
            <i class="bx bx-alarm"></i>
            <span class="link_name">Alarm</span>
          </a>
          <span class="tooltip">Alarm</span>
        </li>
        <li>
          <a href="reminder.php">
            <i class="bx bx-clipboard"></i>
            <span class="link_name">Reminders</span>
          </a>
          <span class="tooltip">Reminders</span>
        </li>
        <li>
          <a href="motivation.php">
            <i class="bx bx-video"></i>
            <span class="link_name">Motivations</span>
          </a>
          <span class="tooltip">Motivations</span>
        </li>
        <li>
          <a href="music.php">
            <i class="bx bxs-music"></i>
            <span class="link_name">My Music</span>
          </a>
          <span class="tooltip">My Music</span>
        </li>
        <li>
          <a href="reports.php">
            <i class="bx bx-line-chart"></i>
            <span class="link_name">Analitics</span>
          </a>
          <span class="tooltip">Analitics</span>
        </li>
        <li>
          <a href="profilePage.php">
            <i class="bx bxs-user-badge"></i>
            <span class="link_name">Profile</span>
          </a>
          <span class="tooltip">Profile</span>
        </li>

        <li class="profile">
          <div class="profile_details">
            <img src="../images/userProfiles/<?php echo $proPicPath;?>" alt="profile image">
            <div class="profile_content">
              <div class="name"><?php echo $username ?></div>
              <div class="designation"><?php echo $email ?></div>
            </div>
          </div>
          
            <i onclick="gotoHome()" class="bx bx-log-out" id="log_out"></i>
              
            <script>
              function gotoHome(){
                //going to the index page or login out then destroying the session and its details
                window.location.href = '../index.php';
                
              }
            </script>
          
        </li>
        
      </ul>
    </div>
    

    <script src="../js/sidebar.js"></script>
    <script src="../js/setAlarms.js"></script>
