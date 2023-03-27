<?php 
session_start();
require_once 'config.php';
if(!isset($_SESSION['user'])){
header('Location:index.php');
die(); }
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style/style1.css"/>
<script src="script/script0.js" type="text/javascript"> </script>
<link rel="icon" href="images/favicon.ico"/>
<title>Fouad</title>
</head>
<body class="body1">
<nav><ul>
<li class="deroulant"><a href="#"> Human services &ensp; </a>
<ul class="sous">
<li><a href="https://www.iucn.org/" target="_blank"> International Union for Conservation of Nature </a> </li>
<li><a href="https://www.worldwildlife.org/" target="_blank"> World Wide Fund For Nature </a></li>
</ul></li>
<li class="deroulant"><a href="#"> News and culture &ensp; </a>
<ul class="sous">
<li><a href="https://techcrunch.com/" target="_blank"> Technology news </a></li>
<li><a href="https://binothaimeen.net/site" target="_blank"> Islamic culture </a></li>
</ul> </li>
<li class="deroulant"><a href="#"> Computer Services &ensp; </a>
<ul class="sous">
<li><a href="https://www.eset.com/fr/home/products/online-scanner/" target="_blank"> Online virus scan </a></li>
<li><a href="https://www.mediafire.com/file/jl4twsncc1w2e0n/FixWin11.zip/file" target="_blank"> Repair Windows 11 </a></li>
</ul></li>
<li class="deroulant"><a href="#"> account &ensp; </a>
<ul class="sous">
<li> <a href="#" data-toggle="modal" data-target="#profile"> Profile </a> </li>
<li> <a href="#" data-toggle="modal" data-target="#change_password"> Change profile </a> </li>
<li> <a id="d1" href="" style="color: red" onclick="myFunction001()"> Delete account </a></li>
<li> <a href="deconnexion.php" style="color: coral"> Log out </a></li>
</ul> </li>
</ul> </li> </ul> </nav>
<div class="text-center">
<?php 
$link = $data['position'];
$nam = $data['full_name'];
echo '<a href="#" data-toggle="modal" data-target="#avatar">'.'<img src="'."https://fouad.rf.gd/login/layouts/".$link.'" width="100px" height="auto"/>'.'</a>'.'<br/>'.'<span style="color:cyan; background-color: black">'.$nam.'</span>'; 
?> </div>
<center>   
<div id="currentDateTime"> </div> </center>
<div> <div class="col-md-12">
<?php 
if(isset($_GET['err'])) {
$err = htmlspecialchars($_GET['err']);
switch($err) {
case 'current_password':
echo "<div class='alert alert-danger'>"."<center>"."The current password is incorrect"."<br/>"."<a href=".$_SERVER['HTTP_REFERER'].">"."Close"."</a>"."</center>"."</div>";
break;
case 'email_used':
echo "<div class='alert alert-danger'>"."<center>"."Email is used"."<br/>"."<a href=".$_SERVER['HTTP_REFERER'].">"."Close"."</a>"."</center>"."</div>";
break;
case 'empty_square':
echo "<div class='alert alert-danger'>"."<center>"."Choose one to change"."<br/>"."<a href=".$_SERVER['HTTP_REFERER'].">"."Close"."</a>"."</center>"."</div>";
break;
case 'name_used':
echo "<div class='alert alert-danger'>"."<center>"."Full Name is used"."<br/>"."<a href=".$_SERVER['HTTP_REFERER'].">"."Close"."</a>"."</center>"."</div>";
break;
case 'success_avatar':
echo "<div class='alert alert-success'>"."<center>"."Avatar changed successfully !"."</center>"."</div>";
header("Refresh: 3;"."URL=". $_SERVER['HTTP_REFERER']);
exit;
break;
case 'success_profile':
echo "<div class='alert alert-success'>"."<center>"."Profile changed successfully !"."</center>"."</div>";
header("Refresh: 3;"."URL=". $_SERVER['HTTP_REFERER']);
exit;
break;
case 'password_mismatched':
echo "<div class='alert alert-danger'>"."<center>"."Password mismatched"."<br/>"."<a href=".$_SERVER['HTTP_REFERER'].">"."Close"."</a>"."</center>"."</div>";
break;
case 'success_password':
echo "<div class='alert alert-success'>"."<center>"."The password has been changed successfully !"."</center>"."</div>";
header("Refresh: 3;"."URL=". $_SERVER['HTTP_REFERER']);
exit;
break; } }
?>
<div class="text-center">
<h3 class="p-5"> 
<?php 
$nam = $data['full_name'];
echo '<span style="background-color: black">'.'<span style="color:chartreuse">'.' '.'Welcome'.' '.'</span>'.'<span style="color:cyan">'.$nam.'</span>'.'<span style="color:gold">'.' '.'to'.' '.'</span>'.'<span style="color:fuchsia">'.'your'.' '.'</span>'.'<span style="color:darkorange">'.'site'.' '.'</span>'.'</span>'; 
?> </h3>
<div class="open">
<table class="tab2"> <tr> <th>
<div id="slideshow">
<img src="images/image007.webp" alt="image" class="slide">
<img src="images/image009.webp" alt="image" class="slide">
<img src="images/image018.webp" alt="image" class="slide">
</div> </th> <th>
<div id ="doc1"> </div>
<script src="script/script10.js"> </script> 
</th> </tr> </table> </div>
<div class="wrapper"> 
<img src="images/image1.webp"/>
<div class="close">
<button style="cursor: pointer; background-color: rgb(25, 197, 12); text-align: center; width: 55px; height: auto; box-shadow: 0 1px 9px rgba(0, 0, 0, 0.493); transition: all 0.4s ease-in-out" onclick="myFunction1('https://www.amazon.com/')"> Visit </button> <button  style="cursor: pointer; background-color: rgb(254, 1, 1); color: black; text-align: center; width: 55px; height: auto;box-shadow: 0 1px 9px rgba(0, 0, 0, 0.493); transition: all 0.4s ease-in-out"> close </button> 
</div> </div>
<FORM class="form" action="https://www.google.com/search" outocomplete="on" method="get" enctype="application/x-www-form-urlencoded" accept-charset="" target="_blank">
<div class="search">
<input class="inputt" type="search" name="q"  placeholder="Search" required>
<button class="button" type="submit" name="btnG"> Search </button> </div> </FORM>
<marquee class="marqu" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrolldelay="0" scrollamount="5"> <div> <p class="b4" onclick="myFunction1('https://enence.com/')"> Muama Enence &ensp;</p> <p class="p1">This Device Turns You Into A Native Speaker Of 36+ Languages In Seconds.</p>
<p class="b5" onclick="myFunction1('https://blackbird4k.com/')"> &ensp; The Black Bird 4K &ensp;</p> <p class="p1"> is a tiny drone with a 4k camera that lets you take breathtaking photos and videos. It's foldable, lightweight and easy to carry.</p>
<p class="b6" onclick="myFunction1('https://www.outlookindia.com/business-spotlight/safe-cam-360-reviews-does-this-light-bulb-security-camera-really-work-must-read-before-you-buy-news-229349')">&ensp; Safe Cam 360 &ensp;</p> <p class="p1"> Always Know What’s Going On At Home, No Matter Where You Are.</p>
</div> </marquee>
<div class="langa" onclick="openNav()"> <p class="prog"> Programming language </p> </div>
<div class="f13">
<div class="ff13">
<h4 class="bb7" onclick="myFunction1('https://www.aroundrobin.com/importance-of-social-justice/')">THE IMPORTANCE OF SOCIAL JUSTICE</h4> <br>
<img class="iim" src="images/image5.webp"  alt="image" width="300px" height="192px" onclick="myFunction1('https://www.aroundrobin.com/importance-of-social-justice/')"/>
<h4 class="b3">We are living in an era of contradictions. While we should focus on building a unified approach towards fighting a global pandemic, we are more divided than ever. We are more connected than ever before in human history, yet are unable to understand the plight of others. We see an evolution of human rights, but see no end to conflict. We are more willing to accept differences, yet discrimination is on the rise. We are living in an era where we have greater freedoms than ever before, yet we see no end to injustice. So where do we go from here? Is there a way to heal the world? Social justice may be the answer.</h4>
<h4 class="bb7" onclick="myFunction1('https://www.womenshealth.gov/relationships-and-safety/domestic-violence/effects-domestic-violence-children')">EFFECTS OF DOMESTIC VOILENCE ON CHILDREN</h4><br>
<img class="iim" src="images/image06.webp" alt="image" width="300px" height="200px" onclick="myFunction1('https://www.womenshealth.gov/relationships-and-safety/domestic-violence/effects-domestic-violence-children')"/>
<h4 class="b3" >Many children exposed to violence in the home are also victims of physical abuse.One: Children who witness domestic violence or are victims of abuse themselves are at serious risk for long-term physical and mental health problems.two: Children who witness violence between parents may also be at greater risk of being violent in their future relationships. If you are a parent who is experiencing abuse, it can be difficult to know how to protect your child.</h4> </div>
<div class="ff14">
<h4 class="bb7" onclick="myFunction1('https://riseservicesinc.org/news/5-stages-child-development/#:~:text=Other%20scholars%20describe%20six%20stages,%2C%20school%20age%2C%20and%20adolescents.')">WHAT ARE THE 5 STAGES OF CHILD DEVELOPMENT</h4><br>
<img class="iim" src ="images/image7.webp" alt="image" width="300px" height="142px" onclick="myFunction1('https://riseservicesinc.org/news/5-stages-child-development/#:~:text=Other%20scholars%20describe%20six%20stages,%2C%20school%20age%2C%20and%20adolescents.')"/>
<h4 class="b3">Children change rapidly as they grow. Many of these changes are physical. Other changes are cognitive, which means the changes affect the way children think and learn. Child development often occurs in stages, with the majority of children hitting specific developmental landmarks by the time they reach a certain age. What are the 5 stages of child development? Read on to find out.</h4>
<h4 class="bb7" onclick="myFunction1('https://caringforkids.cps.ca/handouts/mentalhealth/mental_health')">YOUR CHILD’S MENTAL HEALTH</h4><br>
<img class="iim" src ="images/image8.webp" alt="image" width="300px" height="200px" onclick="myFunction1('https://caringforkids.cps.ca/handouts/mentalhealth/mental_health')"/>
<h4 class="b3">Mental health affects the way people think, feel and act. Taking care of our mental health is just as important as having a healthy body. As a parent, you play an important role in your child's mental health.<br>
You can promote good mental health by the things you say and do, and through the environment you create at home.<br>
You can also learn about the early signs of mental health problems and know where to go for help.</h4> 
</div> </div>
<div id="myNav" class="overlay">
<div>
<a href="#" class="closebtn" onclick="closeNav()"> &times; </a>
</div>
<div class="overlay-content">
<div onclick="closeNav()"> <img src="images/image01.webp" alt="image" onclick="myFunction1('https://www.w3schools.com/')"/> </div> </div> </div>
<center> 
<table class="tabb2">
<tr> <th>
<span class="image-grid1" onclick="clic()">
<img onclick="video()" src="images/image03.webp" alt="image1">
</span>
<th> <span class="span001"> <img id="cliq" src="images/image3.gif" alt="image"/> </span>  </th>
</th>
<th><span class="image-grid2" onclick="clic()">
<img onclick="video2()" src="images/image04.webp" alt="image1"> 
</span></th> </tr > 
</table>
<div class="exp2"> <a href="https://onlinelearning.hms.harvard.edu/hmx/" target="_blank" title="https://onlinelearning.hms.harvard.edu"> <video class="exp" id="vid" src="videos/video2.mp4" poster="images/image19.webp" preload="auto" controls width="400px" height="auto"> </video> </a>
<center> <h2 class="exp0" id="cl" onclick="closse()"> Close </h2 ></center>
<a href="https://youtu.be/zTqCjv2pW-s" target="_blank" title="https://youtu.be/zTqCjv2pW-s"> <video class="exp" id="vid2" src="videos/video3.mp4" poster="images/image18.webp" preload="auto" controls width="400px" height="auto"> </video> </a> </div>
<h2 class="exp0" id="cl2" onclick="closse2()"> Close </h2>
</center>
<div class="f113">
<div class="ff113">
<h4 class="bb7" onclick="myFunction1('https://www.greenmountainenergy.com/why-renewable-energy/protect-the-environment')">12 ways you can protect the environment</h4><br>
<img class="iiim" src="images/image4.webp" width="400px" height="224px" alt="image" onclick="myFunction1('https://www.greenmountainenergy.com/why-renewable-energy/protect-the-environment')"/>
<h4 class="b3">Most of the damage to our environment stems from consumption: what we consume, how much we consume and how often.<br>
Whether it’s gas, food, clothing, cars, furniture, water, toys, electronics, knick-knacks or other goods, we are all consumers. The key is not to stop consuming, but to start being mindful of our consumption habits and how each purchase or action affects the ecosystem.
The good news is that it’s often not too difficult, expensive, or inconvenient to become more environmentally friendly. It can even be a fun challenge to implement among your family or coworkers. And though small changes at the individual level may seem trivial, just think how much cleaner the planet would be If everyone adopts behavior modification.</h4>
</div> </div>
<center> <video class="vid" src="videos/video1.mp4" poster="images/image20.webp" controls preload="auto" width="400px" height="auto"> </video> </center>
</div></div></div>    
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"> <span style='color:blue'> Change Profile </span> </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button> </div>
<div class="modal-body">
<form action="layouts/change_password2.php" method="POST">
<label for='new_name'>New Full Name</label>
<input type="text" name="new_name" class="form-control" placeholder="Enter new full name"/>
<br />
<label for='new_email'>New email</label>
<input type="email" name="new_email" class="form-control" placeholder="Enter New email" />
<br />
<label for='current_password'>Password</label>
<input type="password" name="current_password" class="form-control" placeholder="Enter Password" required/>
<br />
<button type="submit" class="btn btn-success"> Save </button>
</form>
<hr />
<h5> <span style='color:blue'> Change Password </span> </h5>
<hr />
<form action="layouts/change_password.php" method="POST">
<label for='current_password'>Current Password</label>
<input type="password" id="current_password" name="current_password" class="form-control" placeholder="Current Password" required/>
<br />
<label for='new_password'>New Password</label>
<input type="password" id="new_password" name="new_password" class="form-control" placeholder="New password" required/>
<br />
<label for='new_password_retype'>Retype the new password</label>
<input type="password" id="new_password_retype" name="new_password_retype" class="form-control" placeholder="Retype the new password" required/>
<br />
<button type="submit" class="btn btn-success"> Save </button>
</form> </div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div></div></div></div>
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">
<?php 
$link = $data['position'];
echo '<a href="#" data-toggle="modal" data-target="#avatar">'.'<img src="'."https://fouad.rf.gd/login/layouts/".$link.'" width="100px" height="auto"/>'.'</a>'; 
?> 
</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button> </div>
<div class="modal-body">
<label for='full_name'>Full Name:</label>
<?php echo "<span style='color:blue'>". $data['full_name']."</span>"; ?>
<br />
<label for='email'>Email:</label>
<?php echo "<span style='color:blue'>". $data['email']."</span>"; ?>
<br /> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div></div></div></div>
<div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"> <span style='color:blue'> Change Avatar </span> </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button> </div>
<div class="modal-body">
<form action="layouts/avatar.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file" required/>
<label>(< 5Mo)</label>
<br /> <br />
<button type="submit" name="save" class="btn btn-success"> Save </button>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
</div></div></div></div>
<footer class="foter"> <center> <a href="mailto:Fouad.Bechar@outlook.com"> Contact via email </a> </center> </footer>
<script src="script/script2.js"> </script>
<script src="script/script3.js"> </script>
<script src="script/script4.js"> </script>
<script src="script/script5.js"> </script>
<script src="script/script6.js"> </script>
<script src="script/script7.js"> </script>
<script src="script/script8.js"> </script>
<script src="script/script9.js"> </script>
<script src="script/script11.js"> </script>
<script src="script/script13.js"> </script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>