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
<body id="subbody">
   <div class="w3-container w3-teal w3-animate-top">
   <nav class="w3-topnav">
      <a class="w3-right" href="index.html"><b>Log-Out &nbsp;<i class="fa fa-sign-out w3-large"></i></b></a>
      <a class="w3-right" href="#"><b>About</b></a>
      <a class="w3-right" href="#"><b>Developers</b></a>
      <a href="PalWallet.html#mainbody"><i class="fa fa-home w3-xlarge"></i></a>
   </nav>
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
   $arr = array();
   $sql = "SELECT remote_ID, name, amount FROM firsttable";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0)
   {
      while($row = mysqli_fetch_assoc($result))
      {
            if($row['remote_ID'] == $_SESSION["handle"])
            {
               if(in_array($row['name'],$arr))
               {
                  continue;
               }
               else
               {
                  array_push($arr, $row['name']);
               }     
            }  
         }
      }
      $var = 0;
      if(sizeof($arr) > 0)
      {
         echo  "<div class=\"w3-center w3-animate-zoom\">
            <img src=\"images/history.png\" style=\"width:750px;height:100px;\">
            </div>";
      echo  "<div class=\"w3-center w3-card-12 w3-teal\">
            <p class=\"w3-xlarge\"><b>Get me my full history with</b></p>
            <form method=\"post\" action=\"plot.php\">
            <div class=\"w3-padding-bottom\">
            <input placeholder=\"Enter a name from the list below. (P.S. Case Sensitive)\"class=\"w3-center w3-text-black w3-card-12\" type=\"text\" name = \"fullhisname\" style=\"width:600px;height:50px;\">   
            </div>
            <div class=\"w3-padding-bottom\">
               <button type=\"submit\" class=\"w3-large w3-khaki w3-card-12\"><b>Search</b><i class=\"fa fa-search w3-large w3-padding-left\"></i></button>
            </div>
            </form>  
            </div><br/>";     
      foreach ($arr as $value)
         {
            $lend = 0;
            $borrow = 0;
            $sql = "SELECT LB, remote_ID, name, amount FROM firsttable";
         $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
         {
            if($row['remote_ID'] == $_SESSION["handle"] and $row['name'] == $value)
            {
               if($row['LB'] == 'L')
               {
                  $lend = $lend + $row['amount'];
               }
               else
               {
                  $borrow = $borrow + $row['amount']; 
               }  
            }  
         }
         if($var%2 == 0)
               {
               echo "<div class=\"w3-container w3-animate-left\">
                     <div class=\"w3-tooltip\"> 
                        <div class=\"w3-blockquote w3-blue w3-xlarge w3-left w3-card-12\" style=\"width:750px;height:80px;\">
                        <div class=\"w3-xlarge w3-left\"><p><b>".$value."</b></p></div>
                        <div class=\"w3-text w3-right\">
                        <div class=\"w3-left w3-animate-right\"><p>Lended:".$lend."</p></div>
                        <div class=\"w3-left w3-animate-right\"><i class=\"fa fa-money fa-spin w3-xxlarge w3-padding-16 w3-padding-left w3-padding-right\"></i></div>
                        <div class=\"w3-right w3-animate-right\"><p> Borrowed:".$borrow."</p></div>
                        </div>
                     </div>
                  </div>
                  </div>
                  <br/>";
            $var = $var + 1;  
            }
               else
            {
               echo "<div class=\"w3-container w3-animate-right\">
                     <div class=\"w3-tooltip\"> 
                        <div class=\"w3-blockquote w3-yellow w3-xlarge w3-right w3-card-12\" style=\"width:750px;height:80px;\">
                        <div class=\"w3-xlarge w3-left\"><p><b>".$value."</b></p></div>
                        <div class=\"w3-text w3-right\">
                        <div class=\"w3-left w3-animate-right\"><p>Lended:".$lend."</p></div>
                        <div class=\"w3-left w3-animate-right\"><i class=\"fa fa-money fa-spin w3-xxlarge w3-padding-16 w3-padding-left w3-padding-right\"></i></div>
                        <div class=\"w3-right w3-animate-right\"><p> Borrowed:".$borrow."</p></div>
                        </div>
                     </div>
                  </div>
                  </div>
                  <br/>";
            $var = $var + 1;  
            }
      }  
      }
      else
      {
         echo "<div class=\"w3-center w3-animate-zoom\">
            <img src=\"images/no-record-found.png\" style=\"width:750px;height:500px;\">
         </div>";
      }
      mysqli_close($conn); 
   ?>
</body>
</html>