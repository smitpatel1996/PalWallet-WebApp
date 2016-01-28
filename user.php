<?php
session_start();
error_reporting(0);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $handle = $_POST['handle'];
    $variable = 0;
  $pw = $_POST['pw'];
  $servername = "mysql.hostinger.in";
  $uname = "u629516793_pvr";
  $password = "smitpatel1996";
  $conn = mysqli_connect($servername, $uname, $password);
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  mysqli_select_db($conn,"u629516793_udb");
  $sql = "SELECT username, password FROM usertable";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
          if($row['username'] == $handle)
          {
                        $variable = $variable + 1;
            if($row['password'] == $pw)
            {
                                $_SESSION["handle"]=$handle;
        header('Location: http://www.palwallet.16mb.com/html/PalWallet.html');          
            }
            else
            {
                    echo "<html>
          <head>
          <title>PalWallet</title>
          <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
          <link rel=\"stylesheet\" href=\"http://www.w3schools.com/lib/w3.css\">
          <link rel=\"stylesheet\" href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css\">  
          </head>
          <body id=\"mainbody\">
          <div class=\"w3-container w3-teal w3-animate-top\">
          <nav class=\"w3-topnav\">
          <a class=\"w3-right\" href=\"#about\"><b>About</b></a>
          <div class=\"w3-dropdown-hover w3-right\">
          <a class=\"w3-right\" href=\"#\"><b>Developers</b></a>
          <div class=\"w3-dropdown-content w3-border w3-text-black\">
              <a href=\"#\">Smit</a>
              <a href=\"#\">Vineet</a>
              <a href=\"#\">Prince</a>
              <a href=\"#\">Pranav</a>
          </div>    
          </div>  
          <a href=\"#mainbody\"><i class=\"fa fa-home w3-xlarge\"></i></a>
          </nav>
          </div>
          <br/><br/><br/>
          <div class=\"w3-center w3-animate-zoom\">
          <img src=\"images/heading.png\" style=\"width:1000px;height:200px;\">
          </div>
          <br/>
          <div class=\"w3-center w3-card-12 w3-teal w3-modal-content w3-animate-bottom\">
                                        <header class=\"w3-teal w3-container\">
                                        <br/><br/>
                                        </header>
                                        <div>
          <b class=\"w3-xxlarge\">Invalid Password</b>
                                        <div class=\"w3-padding-16\">
                                            <img class=\"w3-animate-zoom\" src=\"https://projekte.datenpool.at/apps/vtpdelta/vtpdelta.nsf/loginInvalid.png\">
                                        </div>
          <div class=\"w3-padding-bottom w3-padding-top\">
          <a href=\"index.html\"><button class=\"w3-large w3-khaki w3-card-12\"><b>I wanna try again.</b></button></a>
          </div>
          <footer class=\"w3-teal w3-container\">
          <br/><br/>
          </footer>
          </div>
          </div>
          <div id=\"about\" class=\"w3-modal\">
          <div class=\"w3-modal-content w3-card-12 w3-animate-bottom\">
          <header class=\"w3-container w3-center w3-teal w3-xlarge\">
          <a href=\"#mainbody\" class=\"w3-closebtn\">x</a>
          <p><b>About PalWallet</b></p>
          </header>
          <br/><br/>
          <div class=\"w3-padding-left w3-padding-right\">
          <p class=\"w3-large\">Welcome to PalWallet. Most people have trouble managing their accounts and keeping track of how much they lend or owe people and whom. Well, with this website we hope to put an end to your troubles. Just enter your transaction details, and leave the rest to us. Individual records with graph description, makes it a lot more easier to view your transactions. So, go ahead and manage your finances.</p>
          <p class=\"w3-large\">And finally, every great thing has a con. We at PalWallet would love to hear your experiences and please do give us your sincere feedback at PVRS@palwallet.in</p>
          <p class=\"w3-large w3-center\">Have fun !!</p> 
          </div>
          <br/><br/>
          <footer class=\"w3-teal w3-container\">
          <br/>
          <br/>
          </footer>
          </div>
          </div>
          </body>
          </html>";
        } 
          }
        }
    }
  if($variable == 0)
    {
            echo "<html>
          <head>
          <title>PalWallet</title>
          <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
          <link rel=\"stylesheet\" href=\"http://www.w3schools.com/lib/w3.css\">
          <link rel=\"stylesheet\" href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css\">  
          </head>
          <body id=\"mainbody\">
          <div class=\"w3-container w3-teal w3-animate-top\">
          <nav class=\"w3-topnav\">
          <a class=\"w3-right\" href=\"#about\"><b>About</b></a>
          <div class=\"w3-dropdown-hover w3-right\">
          <a class=\"w3-right\" href=\"#\"><b>Developers</b></a>
          <div class=\"w3-dropdown-content w3-border w3-text-black\">
              <a href=\"#\">Smit</a>
              <a href=\"#\">Vineet</a>
              <a href=\"#\">Prince</a>
              <a href=\"#\">Pranav</a>
          </div>    
          </div>  
          <a href=\"#mainbody\"><i class=\"fa fa-home w3-xlarge\"></i></a>
          </nav>
          </div>
          <br/><br/><br/>
          <div class=\"w3-center w3-animate-zoom\">
          <img src=\"images/heading.png\" style=\"width:1000px;height:200px;\">
          </div>
          <br/>
          <div class=\"w3-center w3-card-12 w3-teal w3-modal-content w3-animate-bottom\">
                                        <header class=\"w3-teal w3-container\">
                                        <br/><br/>
                                        </header>
                                        <div>
          <b class=\"w3-xxlarge\">Invalid Username</b>
                                        <div class=\"w3-padding-16\">
                                            <img class=\"w3-animate-zoom\" src=\"https://projekte.datenpool.at/apps/vtpdelta/vtpdelta.nsf/loginInvalid.png\">
                                        </div>
          <div class=\"w3-padding-bottom w3-padding-top\">
          <a href=\"index.html\"><button class=\"w3-large w3-khaki w3-card-12\"><b>I wanna try again.</b></button></a>
          </div>
          <footer class=\"w3-teal w3-container\">
          <br/><br/>
          </footer>
          </div>
          </div>
          <div id=\"about\" class=\"w3-modal\">
          <div class=\"w3-modal-content w3-card-12 w3-animate-bottom\">
          <header class=\"w3-container w3-center w3-teal w3-xlarge\">
          <a href=\"#mainbody\" class=\"w3-closebtn\">x</a>
          <p><b>About PalWallet</b></p>
          </header>
          <br/><br/>
          <div class=\"w3-padding-left w3-padding-right\">
          <p class=\"w3-large\">Welcome to PalWallet. Most people have trouble managing their accounts and keeping track of how much they lend or owe people and whom. Well, with this website we hope to put an end to your troubles. Just enter your transaction details, and leave the rest to us. Individual records with graph description, makes it a lot more easier to view your transactions. So, go ahead and manage your finances.</p>
          <p class=\"w3-large\">And finally, every great thing has a con. We at PalWallet would love to hear your experiences and please do give us your sincere feedback at PVRS@palwallet.in</p>
          <p class=\"w3-large w3-center\">Have fun !!</p> 
          </div>
          <br/><br/>
          <footer class=\"w3-teal w3-container\">
          <br/>
          <br/>
          </footer>
          </div>
          </div>
          </body>
          </html>"; 
    }
    mysqli_close($conn);      
  die();
}
?>              