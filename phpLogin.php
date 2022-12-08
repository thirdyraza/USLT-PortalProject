<?php
  session_start();
  ob_start();
  include 'included/conndb.php';
  $conn = OpenConn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>USLT Student Portal</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="images/logo.png">
</head>
    <style>
      <?php include './css/styles.css';?>
    </style>
    <body>
        <div class="mainParent">
            <header>
              
                <div class="mainback">
                  <div class="login">
                      <div class="loghead">Sign in</div>
                      <form method="post">
                        <div class="logbody">
                            <div class="user">
                                <input type="text" name="idnum" required placeholder="ID number">
                            </div>

                            <div class="pass">
                                <input type="password" name="pass" required placeholder="Password" id="pwd">
                            </div>

                        </div>
                            <div class="check">
                              <div class="ckbox"><input type="checkbox" name="chckBox"></div>
                              <p>I Accept the <span><a href="#" style="font-decoration: none;">Terms of use</a>.</span></p>
                            </div>
                            <div id="btn">
                              <input class="btn" type="submit" name="btnLogin" value="Log In">
                            </div>
                        </form>
                        <?php
                          if (isset($_POST['btnLogin']) && isset($_POST['chckBox'])){
                            $IDN = $_POST['idnum'];
                            $PWD = $_POST['pass'];
                          
                          $select_query = $conn->prepare("Select * from student where IDNumber=? and Password=?");
                          $select_query->bind_param("ss", $IDN, $PWD);
                          $select_query->execute();
                          $select_query->store_result();

                            if($select_query->num_rows === 0){
                              exit('Found no records');
                            } else {
                              $_SESSION['idNumber'] = $IDN;
                              $_SESSION['PassWord'] = $PWD;
                              header("location: phpIndex.php");
                              CloseConn();
                            }                 
                          }
                        ?>
                  </div>
                </div>
                
            </header>
           
            <nav id="nav1">
                <div class="logo">
                    
                    <img src="images/logo.png" alt="logo">

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

            <div class="scontainer">
                <div id="s1">
    
                  <div class="s1child">
                      <h1>terms of use</h1>
                      <div class="s1content">
                            <p>
                            Using this facility on the university website indicates that you have read and accept these terms and conditions and agree to be bound by and comply with them. <span style="color: red;">If you do not accept these terms, do not use this facility.</span>
                            </p>
                           <p>
                            University of Saint Louis reserves the right to modify these terms at any time and will publish notice of any such modifications at this site. By continuing to access the portal after notice of such modifications has been published, you signify your agreement to be bound by them.
                            <span id="dots">...</span>      
                          </p>
                            <span id="more">
                                <p>
                                The University of Saint Louis provides electronic access to demographic, grade, and other information related to its students via its Student Portal system. This information is intended for the use of the currently enrolled students, their parents or their legal guardians
                                </p>
                                <p>
                                The University reserves the right to grant or deny access to the Student Portal system in accordance with the existing ICT policies of the University.
                                </p>
                                <p>
                                The Student/Parent account information to access the portal determines who has access to the student's records and must be current and accurate to ensure the student's privacy. If the user thinks that the account is no longer safe, a new account should be registered at the Center for Information and communications Technology(CICT). The user name and password used to access student information via the Student Portal system should not be shared with unauthorized individuals. USL will not be responsible for unauthorized access to or use of such information.
                                </p>
                                <p>
                                While USL strives to ensure information on its Student Portal is accurate and up-to-date, the system does not contain official information. Official information is maintained in the student's cumulative record and/or the Registrar's Office files. Any student demographic or contact information that is found to be incorrect should be reported to and corrected by the university through concerned offices. A parent, guardian, or student who believes grade information is incorrect should promptly contact the Teacher of Record for the class in question.
                                </p>
                                <p>
                                Any data presented via the Student Portal is subject to change without notice. Although USL strives to provide access to student information via the Student Portal system at all times, technical difficulties, including those beyond our control, may make such access temporarily unavailable. As a result, continuous, uninterrupted access to the Student Portal cannot be guaranteed.
                                </p>
                           </span>
                            <button onclick="myFunction()" id="myBtn">Read more</button>
                      </div>
                  </div>
                  

                </div>

                <div id="s2">
                  <section class="card-list">
                        <article class="card">
                          <header class="card-header">
                            <p>FAQ'S #1</p>
                            <h2>How can I register for an account?</h2>
                            <p>In case you do not have any existing third-party account, you will have to register a USL account providing your ID Number (which will serve as your username) and your desired Password to access the portal.</p>
                          </header>
                        </article>



                        <article class="card">
                          <header class="card-header">
                            <p>FAQ'S #2</p>
                            <h2>How can I change my account information?</h2>
                            <p>If you want to change your account information (passwords / third-party account), go to the CICT (formerly CCIS) and fill-up a form for Update of Account.</p>
                          </header>
                        </article>




                        <article class="card">
                          <header class="card-header">
                            <p>FAQ'S #3</p>
                            <h2>Can our records be viewed by other students using their accounts?</h2>
                            <p>No, only the records of the student who owns the account (based on IDNumber) can be viewed by the same student.</p>
                          </header>
                        </article>

                        <article class="card">
                          <header class="card-header">
                            <p>FAQ'S #4</p>
                            <h2>How can I register for an account?</h2>
                            <p>In case you do not have any existing third-party account, you will have to register a USL account providing your ID Number (which will serve as your username) and your desired Password to access the portal.</p>
                          </header>
                        </article>


                        <article class="card">
                          <header class="card-header">
                            <p>FAQ'S #5</p>
                            <h2>How can I change my account information?</h2>
                            <p>If you want to change your account information (passwords / third-party account), go to the CICT (formerly CCIS) and fill-up a form for Update of Account.</p>
                          </header>
                        </article>

                        <article class="card">
                          <header class="card-header">
                            <p>FAQ'S #6</p>
                            <h2>Can our records be viewed by other students using their accounts?</h2>
                            <p>No, only the records of the student who owns the account (based on IDNumber) can be viewed by the same student.</p>
                          </header>
                        </article>

                        <article class="card">
                          <header class="card-header">
                            <p>FAQ'S #7</p>
                            <h2>How can I register for an account?</h2>
                            <p>In case you do not have any existing third-party account, you will have to register a USL account providing your ID Number (which will serve as your username) and your desired Password to access the portal.</p>
                          </header>
                        </article>
                  </section> 
                </div>

                <div id="s3">
                    <h1>disclaimer</h1>
                    <p>
                      The information provided in this portal may contain data in different stages of processing or calculations in the university. The contents of this portal are made available on a VIEW ONLY basis for the convenience and information of students, parents and other authorized users. These Pages are not official documents and may not be printed out and otherwise used or passed around as official documents. Official documents are those issued by and obtained at the Registrar's Office or at the Accounting office of the university.
                    </p>
                    <p>
                      Any questions and concerns on the information posted in these pages must be made known at the Registrar's Office for academic related concerns who may direct the students to the proper Faculty Member or Office of the University; or the Accounting Office for financial concerns. Only inquiries from students concerned, their parents or other parties authorized by students shall be entertained officially.
                    </p>
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