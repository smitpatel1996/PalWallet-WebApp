<?php
   session_start();
?>
<html>
<head>
   <title>Your History !!</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
   <div class="w3-container w3-teal w3-animate-top">
   <nav class="w3-topnav">
      <a class="w3-right" href="index.html"><b>Log-Out &nbsp;<i class="fa fa-sign-out w3-large"></i></b></a>
      <a class="w3-right" href="#"><b>About</b></a>
      <a class="w3-right" href="#"><b>Developers</b></a>
      <a href="showList.php#subbody"><i class="fa fa-arrow-left w3-xlarge"></i></a>
      <a href="PalWallet.html#mainbody"><i class="fa fa-home w3-xlarge"></i></a>
   </nav>
   </div>
   <header class="w3-container w3-teal w3-center w3-animate-top">
      <p class="w3-xxlarge"><b>Your History With <?php $_SESSION["graphval"] = $_POST["fullhisname"]; echo $_SESSION["graphval"];?> Till Date</b></p>
   </header>
   <br/><br/>
   <div class="w3-center w3-animate-bottom">
      <img class="w3-center w3-card-12" src="graph.php" />
   </div>
   <br/>
   <br/>
   <div class = "w3-container w3-teal w3-animate-bottom w3-center" >
      <p class="w3-container w3-xxlarge w3-teal"><b>Your Lend and Borrow Details</b></p>
   </div>
   <br/>
   <br/>
   <?php
   error_reporting(0);
   $servername = "mysql.hostinger.in";
   $username = "u629516793_pvr";
   $password = "smitpatel1996";
   $conn = mysqli_connect($servername, $username, $password);
   if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
   }
   mysqli_select_db($conn,"u629516793_udb");
   $lend = 0;
   $borrow = 0;
   $sql = "SELECT LB, remote_ID, name, amount, transdate,reason FROM firsttable";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0)
   {
      while($row = mysqli_fetch_assoc($result))
      {
         if($row['remote_ID'] == $_SESSION['handle'])
         {
            if($row['name'] == $_SESSION["graphval"])
            {
               if($row['LB'] == 'L')
               {  $lend = $lend + $row['amount'];                       
                  echo "<div class=\"w3-container w3-animate-left\">
                        <div class=\"w3-blockquote w3-green w3-xlarge w3-left w3-card-12\" style=\"width:900px;height:80px;\">
                        <div class=\"w3-xlarge w3-left\"><p><b>Lended Rs.".$row['amount']." on ".$row['transdate']." - ".$row['reason']."</b></p></div>
                        </div>
                     </div>
                  <br/>";
               }   
               else
               {  $borrow = $borrow + $row['amount'];
                  echo "<div class=\"w3-container w3-animate-right\">
                        <div class=\"w3-blockquote w3-red w3-xlarge w3-right w3-card-12\" style=\"width:900px;height:80px;\">
                        <div class=\"w3-xlarge w3-left\"><p><b>Borrowed Rs.".$row['amount']." on ".$row['transdate']." - ".$row['reason']."</b></p></div>
                        </div>
                     </div>
                  <br/>";
               }
            }                     
         }   
      }  
   }
   echo "<br/><br/><br/>";
   $overall = $lend - $borrow;
   if($overall > 0)
   {
      echo "<div class = \"w3-container w3-green w3-animate-opacity w3-center\" >
            <p class=\"w3-container w3-xxlarge\"><b>Overall, ".$_SESSION["graphval"]." owes you ".$overall.".</b></p>
          </div><br/>";
   }
   elseif ($overall == 0)
   {
      echo "<div class = \"w3-container w3-green w3-animate-opacity w3-center\" >
            <p class=\"w3-container w3-xxlarge\"><b>Overall, You and ".$_SESSION["graphval"]." are balanced.</b></p>
          </div><br/>"; 
   }
   else
   {
      echo "<div class = \"w3-container w3-red w3-animate-opacity w3-center\" >
            <p class=\"w3-container w3-xxlarge\"><b>Overall, You owe ".$_SESSION["graphval"]." Rs.".abs($overall).".</b></p>
          </div><br/>";
   }  
   mysqli_close($conn); 
   ?>
<footer class="w3-teal w3-container">
            <br/>
            <br/>
            <br/>
         </footer>   
</body>
</html>