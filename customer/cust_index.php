<?php
session_start();
$error='';
if (isset($_POST['submit'])) {
	if(empty($_POST['user']) || empty($_POST['pass'])){
		echo  "<script> alert('You Missed Something'); window.location.href='index.php'</script>";
	}
	else{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$_SESSION['user']=$user;
		$_SESSION['pass']=$pass;

        if($user == "admin")
        {
        	$conn = mysqli_connect("localhost","root","");
        	$db = mysqli_select_db($conn,'login');
        	$query = mysqli_query($conn,"SELECT * FROM admins WHERE adminname = '$user' AND adminpass = '$pass' ");
        	$rows = mysqli_num_rows($query);
        	if($rows==1){
        		header("Location: adminpage.php");
        	}
        	else{	 
        		echo "<script> alert('Don\'t Try To Fool'); window.location.href='index.php'</script>";
        	}
        }
        else
        {
		$conn = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($conn,"login");
		$query = mysqli_query($conn,"SELECT * FROM user WHERE username= '$user' AND password='$pass'");
		$rows = mysqli_num_rows($query);
		if($rows==1){
			echo $user;
			header("location: ../cust_welcome.php");
		}
		else echo "<script> alert('Wrong Credentials'); window.location.href='index.php'</script>";
		
	   }
	   mysqli_close($conn);
	}
	# code...
}

?>
<!doctype html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Welcome</title>
     <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="../style.css">
      <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">  
<?php 
 include('cust_functions.php');
  nav2();
  login_modal();
?>

<div class="username" style="text-align:center; margin-bottom: 15px; " > <?php echo "Welcome "; echo $_SESSION['user']; ?></div>
<div class="row">
 <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
<div class="slideshow">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
 
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../images/1.jpg" style="width:100%; height: 400px; " >
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>

    <div class="item">
      <img  src="../images/2.jpg" style="width:100%; height: 400px;">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>

    <div class="item">
      <img src="../images/3.jpg" style="width:100%; height: 400px;">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>
 </div>

  
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


 
<footer>
      <div class="footer">
        <p>CopyRight@2016 RestApp</p>
      </div>
    </footer>
 </div>
  </div>
  </div>
?>
</body>
</html>
