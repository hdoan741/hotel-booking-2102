<html>
<head>
	<title><?php echo $title ?> - Amazing Hotel</title>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="/css/custom.css">
</head>
<body>
  <div class="navbar-wrapper">
    <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
    <div class="container">
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/">Amazing Hotels</a>
          <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#hotels">Our Hotels</a></li>
              <li><a href="/about">About Us</a></li>
              <li><a href="#contact">Contact Us</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          <div class="pull-right">
            <ul class="nav">
              <?php if ($current_user) { ?>
                <li class="user-name"><a href="#profile_link">My Profile</a></li>
                <li class="user-name"><a href="/auth/logout">Logout</a></li>
              <?php } else { ?>
                <li><a href="/auth/create_user">Register</a></li>
                <li><a href="/auth/login">Login</a></li>
              <?php } ?>
            </ul>
          </div>
        </div><!-- /.navbar-inner -->
      </div><!-- /.navbar -->
    </div> <!-- /.container -->
  </div><!-- /.navbar-wrapper -->
