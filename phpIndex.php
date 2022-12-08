<?php
  session_start();
  include 'included/conndb.php';
  ob_start();
  if(isset($_SESSION['idNumber']) && isset($_SESSION['PassWord'])){
    $numberID = $_SESSION['idNumber'];
    $PassW = $_SESSION['PassWord'];
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
  <style>
  <?php include 'css/styles.css'; ?>
  </style>
    <body>
        <div class="mainParent">

            <header>
              
                <div class="mainback" id="backg">
                  <div class="fade">
                    <div class="welcome">
                      <h1>welcome louisian!</h1>
                    </div>
                  </div>
                
            </header>
           
            <nav id="nav1">
                <div class="logo">
                    
                    <img src="images/logo.png">

                </div>
                
                    <ul>
                        <div class="links">
                            <li><a href="#ss1">Basic Information</a></li>
                            <li><a href="#ss2">Contacts</a></li>
                            <li><a href="#ss3">Family</a></li>
                            <li><a href="#ss3">Education</a></li>
                        </div>  
                    </ul>
            </nav>

            <div id="containsss">
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
                         <?php
                            $select_query = $conn->prepare("Select * from student where IDNumber=? and Password=?");
                            $select_query->bind_param("ss", $numberID, $PassW);
                            $select_query->execute();
                            $select_query->store_result();
              
                                if($select_query->num_rows===0) {
                                  echo "<h4>No Record found!</h4>";
                                } else {
                                  $select_query->bind_result($IDNumber, $Fullname, $Course, $YearLevel, $Gender, $CivilStatus, $Birthdate, $BirthPlace, $Nationality, $Religion, $TelNumber, $PhoneNumber, $EmailAddress, $HomeAddress, $PrimaryEduc, $SecondaryEduc, $SeniorHS, $Password);
                                  while($select_query->fetch()) {
                                    echo

                                    '
                                    <div id="ss1">
                                    <div id="ss1-child">
                                    <h1>BASIC INFORMATION</h1>
                                    <table id="basic-info">
                                      <tr>
                                            <th>Name</td>
                                            <td>'.$Fullname.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Course</td>
                                            <td>'.$Course.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Year Level</td>
                                            <td>'.$YearLevel.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Gender</td>
                                            <td>'.$Gender.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Civil Status</td>
                                            <td>'.$CivilStatus.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Date of Birth</td>
                                            <td>'.$Birthdate.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Place of Birth</td>
                                            <td>'.$BirthPlace.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Nationality</td>
                                            <td>'.$Nationality.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Religion</td>
                                            <td>'.$Religion.'</td>                            
                                      </tr>
                                    </table>
                                    </div>
                                  </div>

                                    <div id="ss2">
                                    <div id="ss2-child">
                                    <h1>CONTACT INFORMATION</h1>
                                    <table id="basic-info">
                                      <tr>
                                            <th>Telephone Number</td>
                                            <td>'.$TelNumber.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Cellphone Number</td>
                                            <td>'.$PhoneNumber.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Email Address</td>
                                            <td>'.$EmailAddress.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Home Address</td>
                                            <td>'.$HomeAddress.'</td>                            
                                      </tr>
                                      </table>
                                    </div>
                                  </div>

                                  <div id="ss3">
                                  <div id="ss3-child">

                                    <h1>EDUCATION</h1>
                                    <table id="basic-info">
                                      <tr class="educ">
                                        <th>EDUCATION</th>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <th>Primary Education</td>
                                        <td>'.$PrimaryEduc.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Secondary Education</td>
                                            <td>'.$SecondaryEduc.'</td>                            
                                      </tr>
                                      <tr>
                                            <th>Senior High School</td>
                                            <td>'.$SeniorHS.'</td>                            
                                      </tr>
                                      </table>

                                      </div>
                                    </div>
                                       ';
                                  }
                                }
                         ?>
                  </div>
          </div>

                  
    
        </div>
        
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
        
        <script>
          function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");
          
            if (dots.style.display === "none") {
              dots.style.display = "inline";
              btnText.innerHTML = "Read more"; 
              moreText.style.display = "none";
            } else {
              dots.style.display = "none";
              btnText.innerHTML = "Read less"; 
              moreText.style.display = "inline";
            }
          }
          </script>
    </body>
</html>