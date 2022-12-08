<?php
  session_start();
  include 'included/conndb.php';
  ob_start();
  if(isset($_SESSION['PassWord']) && isset($_SESSION['idNumber'])){
        $oldPassword = $_SESSION['PassWord'];
        $conn = OpenConn();
  } else {
    header("location: phpLogin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>USLT Student Portal</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="images/logo.png">
</head>
    <body>
        <div class="mainParent">
            <header>
              
                <div class="mainback">
                  <div class="login2">
                      <div class="loghead">Change Password</div>
                      <form method="post">
                        <div class="logbody">
                            <div class="user">
                                <input type="password" name="oldpass" required placeholder="Old Password">
                            </div>

                            <div class="pass">
                                <input type="password" name="newpass" required placeholder="New Password (8 - 16 characters)">
                            </div>

                            <div class="pass">
                              <input type="password" name = "newpasscon" required placeholder="Confirm New Password">
                          </div>
                          
                        </div>
                            <div id="btn">
                                <input class="btn" type="submit" name="btnChange" value="Change Password">
                            </div>
                        </form>
                        <?php                            
                            if(isset($_POST['btnChange'])){
                                if($_POST['newpass'] === $_POST['newpasscon'] && $_POST['oldpass'] === $oldPassword){
                                    $IDN = $_SESSION['idNumber'];
                                    $PWD = $oldPassword;

                                    $get_query=$conn->prepare('Update student set Password='.$_POST['newpass'].' where IDNumber=?');
                                    $get_query->bind_param("s", $IDN);
                                    $get_query->execute();
                                    $get_query->store_result();

                                    if($select_query->num_rows===0) {
                                        echo "<h4>No Record Found</h4>";
                                    } else {
                                        echo"<h3>Password Successfully Changed</h3>";
                                        header("location: phpIndex.php");
                                    }
                                } else {
                                    echo "<h3>The Password doesn`t match</h3>";
                                }

                            }

                        ?>
                  </div>
                </div>
                <div id="ss1">
			<nav class="side-nav">
			<div class="side-btn">
                  <a href="phpIndex.php">
                    <img src="images/button-1.png">
                  </a>
              </div>
              
              <div class="side-btn">
                  <a href="phpGrades.php">
                  <img src="images/button-2.png">
                  </a>
              </div>
      
              <div class="side-btn">
              <a href="phpChangePass.php" target="blank">
                  <img src="images/Password.png">
                  </a>
              </div>
      
              <div class="side-btn">
                  <a href="phpLogOut.php">
                  <img src="images/LogOut.png">
                  </a>
              </div>
		   </nav>
		</div>

                <nav id="navout">
                  <div class="logo">
                      
                      <img src="images/logo.png">
  
                  </div>
              
                  <ul>
                      <div class="links">
                          <li><a href="#s1">Terms of Use</a></li>
                          <li><a href="#s2">FAQ's</a></li>
                          <li><a href="http://usl.edu.ph/contact-us/" target="blank">Contact Us</a></li>
                          <li><a href="http://usl.edu.ph/" target="blank">USLT Website</a></li>
                      </div>  
                  </ul>
  
              </nav>
                
            </header>
           
            
        
        <footer>
            <div class="ps">
                <p>USLT Student's Portal, All rights reserved.</p>
                <p>University of Saint Louis - Tuguegarao City</p>
                <p>Center of Information and Communications Technology</p>
            </div>

            <div class="cicm">
                <p>A CICM Academic Institution</p>
                <img src="images/cicm.png" alt="">
            </div>
        </footer>
    </body>

</html>