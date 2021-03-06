<?php  
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile | ClassChecker</title>
	<meta name="viewport" content="width=device, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Loading Flat UI -->
    <link href="Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">
    <link href="Flat-UI-master/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="Flat-UI-master/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="CSS/profile_style.css">

    <!-- JavaScript -->
    <script src="Flat-UI-master/dist/js/vendor/jquery.min.js"></script>
    <script src="Flat-UI-master/dist/js/flat-ui.min.js"></script>
    <script src="Flat-UI-master/docs/assets/js/application.js"></script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type='text/javascript' src='JS/scriptHome.js'></script>
    <script type='text/javascript' src='JS/scriptChangeProfile.js'></script>

    <script type="text/javascript">
    $(document).ready(function() {
      var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
                $('.profile-icon').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
    </script>
</head>
<body>
  <div class="container">
  <div class="col-xs-12">
          <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" id="home-navbar">ClassChecker</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="http://www.ku.ac.th/king10.html" target="_blank">Kasetsart University</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-center">
                <li><a href="#fakelink">About</a></li>
                <li><a href="contact.php">Contact Us</a></li>
               </ul>

                <?php 
                  include 'PHP/info_navbar.php';
                ?>
                
            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
  </div>
  <div class="box">
	<div class="info-box">
		<form method="post" id="form-profile">
      <h4>Profile Information</h4>
      <div class="profile-pic-zone">
  			<img class="profile-pic" src="<?php echo $_SESSION["path_pic"] ?>" name="path_pic" />
        <input class="file-upload" value="UPLOAD PICTURE" type="file" capture>
        </input >    
      </div>
      <h6 class="text-user">Username</h6>
      <h5 class="user" id="username"><?php echo $_SESSION["username"] ?></h5>
      <label class="text-email">Email 
        <input type="email" value="<?php echo $_SESSION["email"] ?>" placeholder="Your Email" class="form-control input-sm" name="email"/>
      </label>
      <br><br>
      <div class="fname-box">
      <label>First Name
        <input type="text" value="<?php echo $_SESSION["fname"] ?>" placeholder="First Name" class="form-control" name="fname" />
      </label>
      </div>
      <div class="lname-box">
      <label>Last Name
        <input type="text" value="<?php echo $_SESSION["lname"] ?>" placeholder="Last Name" class="form-control" name="lname" />
      </label>
      </div>
      <small>To make these changes, please verify your password</small>
      <input type="password" class="form-control login-field" value="" placeholder="Password" name="confirm-pass">
      <br>
      <input type="submit" class="btn btn-block btn-lg btn-info" name="btn-save" value="Save Profile Info">
		</form>
	</div>
  </div>
</div> 
</body>
</html>