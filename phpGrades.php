<?php
  session_start();
  include 'included/conndb.php';
  if(isset($_SESSION['idNumber']) && isset($_SESSION['PassWord'])){
	$conn = OpenConn();
	$numberID = $_SESSION['idNumber'];
  } else {
    header("location: phpLogin.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>USL Student Portal</title>
	<link rel="stylesheet" type="text/css" href="css/gradesheet.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="images/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
	<style>
  		<?php include 'css/gradesheet.css'; ?>
  	</style>
<body>
	<div id="dropnav">
		<a href="index.html"><img src="images/favicon.png"></a>
	</div>

	<div class="mainParent">
		<div id="lines">
			<div class="lines"></div>
			<div class="lines"></div>
			<div class="lines"></div>
		</div>
		<nav id="navgrades">
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
		
			<div class="bg">
					
			<div class="gradesparent">
				<div class="grades">
					<div id="year1">
					<table class="firsem">
						<tr id="pos1">
							<h4>S.Y. 2019 - 2020</h4>
							<h3>1ST SEMESTER</h3>
						</tr>
						<thead>
							<tr class="titles1">
								<th>Subject ID</th>
								<th>Descriptive Title</th>
								<th>Grade</th>
								<th>Units</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$tempG = 0;
							$tempU = 0;
							$tempA = 0;
							$ave = 0;
							$select_query = $conn->prepare("Select * from grade where IDNumber=? and Semester='First'");
							$select_query->bind_param("s", $numberID);
							$select_query->execute();
							$select_query->store_result();

  								if($select_query->num_rows===0) {
										echo "<h4>No Record Found</h4>";
								  } else {
									  $select_query->bind_result($IDNumber, $SubjectID, $DescriptiveTitle, $Units, $Grade, $Semester);
									  while($select_query->fetch()) {
										  echo '<tr>
													<td class="code">'.$SubjectID.'</td>
													<td class="description">'.$DescriptiveTitle.'</td>
													<td class="grade">'.$Grade.'</td>
													<td class="units">'.$Units.'</td>
												</tr>';
											$tempG = ($Grade*$Units);
											$tempU += $Units;
											$tempA += $tempG;
									  }
									  	$ave = $tempA/$tempU;
											echo'<tr class="gwa">
													<th></th>
													<th></th>
													<th class="ave">Average: '.$ave.'</th>
													<th class="uni">Total Units: '.$tempU.'</th>
												</tr>';
								  }
						?>
						</tbody>
						
					</table>
					<table class="secsem">
						<tr class="sekan">
							<h3>2ND SEMESTER</h3>
						</tr>
						<thead>
							<tr class="titles2">
								<th>Subject ID</th>
								<th>Descriptive Title</th>
								<th>Grade</th>
								<th>Units</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$tempG = 0;
							$tempU = 0;
							$tempA = 0;
							$ave = 0;
							$select_query = $conn->prepare("Select * from grade where IDNumber=? and Semester='Second'");
							$select_query->bind_param("s", $numberID);
							$select_query->execute();
							$select_query->store_result();

  								if($select_query->num_rows===0) {
									  echo "<h4>No Record found!</h4>";
								  } else {
									  $select_query->bind_result($IDNumber, $SubjectID, $DescriptiveTitle, $Units, $Grade, $Semester);
									  while($select_query->fetch()) {
										  echo '<tr>
													  <td class="code">'.$SubjectID.'</td>
													  <td class="description">'.$DescriptiveTitle.'</td>
													  <td class="grade">'.$Grade.'</td>
													  <td class="units">'.$Units.'</td>
												 </tr>';
											$tempG = ($Grade*$Units);
											$tempU += $Units;
											$tempA += $tempG;
									  }
									  $ave = $tempA/$tempU;
										echo'<tr class="gwa">
												<th></th>
												<th></th>
												<th class="ave">Average: '.$ave.'</th>
												<th class="uni">Total Units: '.$tempU.'</th>
											</tr>';
								  }
						?>
						</tbody>
						
					</table>
					<table class="shosem">
						<tr>
							<h3>SHORT SEMESTER</h3>
						</tr>
						<thead>
							<tr class="titles3">
								<th>Subject ID</th>
								<th>Descriptive Title</th>
								<th>Grade</th>
								<th>Units</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$tempG = 0;
							$tempU = 0;
							$tempA = 0;
							$ave = 0;
							$select_query = $conn->prepare("Select * from grade where IDNumber=? and Semester='Summer'");
							$select_query->bind_param("s", $numberID);
							$select_query->execute();
							$select_query->store_result();

  								if($select_query->num_rows===0) {
									  echo "<h4>No Record found!</h4>";
								  } else {
									  $select_query->bind_result($IDNumber, $SubjectID, $DescriptiveTitle, $Units, $Grade, $Semester);
									  while($select_query->fetch()) {
										  echo '<tr>
													  <td class="code">'.$SubjectID.'</td>
													  <td class="description">'.$DescriptiveTitle.'</td>
													  <td class="grade">'.$Grade.'</td>
													  <td class="units">'.$Units.'</td>
												 </tr>';
											$tempG = ($Grade*$Units);
											$tempU += $Units;
											$tempA += $tempG;
									  }
									  $ave = $tempA/$tempU;
										echo'<tr class="gwa">
												<th></th>
												<th></th>
												<th class="ave">Average: '.$ave.'</th>
												<th class="uni">Total Units: '.$tempU.'</th>
											</tr>';
								  }
						?>
						</tbody>
						
					</table>
				</div>
				</div>
			</div>
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

		<!--
			<script>
	window.onscroll = function() {
		scrollFunction();
	}
	
	function scrollFunction() {
	  if (document.body.scrollTop > 110 || document.documentElement.scrollTop > 110) {
	    document.getElementById("dropnav").style.top = "0";
	  } else {
	    document.getElementById("dropnav").style.top = "-150px";
	  }
	}
	var prevScrollpos = window.pageYOffset;
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("oneyear");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
	      dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	}
</script>	
		-->

	</body>
</html>