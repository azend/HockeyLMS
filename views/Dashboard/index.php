
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard | HockeyMS</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <style>
/*
 *  * Base structure
 *   */

/* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top: 50px;
}


/*
 *  * Global add-ons
 *   */

.sub-header {
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 *  * Top navigation
 *   * Hide default border to remove 1px line.
 *    */
.navbar-fixed-top {
  border: 0;
}

/*
 *  * Sidebar
 *   */

/* Hide for mobile, show later */
.sidebar {
  display: none;
}
@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 51px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #f5f5f5;
    border-right: 1px solid #eee;
  }
}

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
  background-color: #428bca;
}


/*
 *  * Main content
 *   */

.main {
  padding: 20px;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}


/*
 *  * Placeholder dashboard ideas
 *   */

.placeholders {
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 {
  margin-bottom: 0;
}
.placeholder {
  margin-bottom: 20px;
}
.placeholder img {
  display: inline-block;
  border-radius: 50%;
}
    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php if ($user->userRole === UserRoles::SYSTEM_ADMIN) { ?>

    
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Welcome <?php echo $user->username; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo UrlHelper::genUrl('logout'); ?>">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
	<center><Label style >System Administrator</label></center>
	<hr>
	<center><img src="public/images/load-memory.gif" class="img-responsive" alt="RAM" height="700" width="700"></center>

    <?php } else if ($user->userRole === UserRoles::LEAGUE_ADMIN) { ?>


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Welcome <?php echo $user->username; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		    <li><a href="#">Leagues</a></li>
			<li><a href="#">Teams</a></li>
			<li><a href="#">Schedules</a></li>
			<li><a href="#">Standings</a></li>
			<li><a href="#">Find Player or Coach</a></li>
			<li><a href="#">Users</a></li>
            <li><a href="<?php echo UrlHelper::genUrl('logout'); ?>">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
	<center><Label style >League Administrator</label></center>
	<hr>
	<center><img src="public/images/4.jpg" class="img-responsive" alt="Team Standings" height="750" width="750"></center>


    <?php } else if ($user->userRole === UserRoles::COACH) { ?>


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Welcome <?php echo $user->username; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Roster</a></li>
			<li><a href="#">Practice Schedule</a></li>
			<li><a href="#">Game Schedule</a></li>
			<li><a href="#">Statistics</a></li>
			<li><a href="#">Standings</a></li>
			<li><a href="<?php echo UrlHelper::genUrl('logout'); ?>">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
	<center><Label style >Coach</label></center>
	<hr>
	<img src="public/images/3.png" class="img-responsive" alt="RAM" height="600" width="750" align="left">
	<img src="public/images/2.png" class="img-responsive" alt="RAM" height="600" width="750" align="right">
	
	<br><br><br>
          <center><h2 class="sub-header">Player Streaks</h2>
          <div class="table-responsive">
            <table class="table table-striped" width="8" height="15">
              <thead>
                <tr>
                  <th>#</th>
				  <th>Hot or Cold</th>
                  <th>Player Name</th>
                  <th>Position</th>
                  <th>Point Streak</th>
				  <th>+-</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>21</td>
				  <td><img src="public/images/Hot.png" class="img-responsive" alt="Hot" height="48" width="48" align="center"></td>
                  <td>Jon Drupple</td>
                  <td>Center</td>
                  <td>12</td>
                  <td>+4</td>
                </tr>
                <tr>
                  <td>44</td>
                  <td><img src="public/images/Hot.png" class="img-responsive" alt="Hot" height="48" width="48" align="center"></td>
                  <td>Harry Potter</td>
                  <td>Defence</td>
				  <td>3</td>
                  <td>+12</td>
                </tr>
                <tr>
                  <td>33</td>
				  <td><img src="public/images/Cold.png" class="img-responsive" alt="Hot" height="48" width="48" align="center"></td>
                  <td>Austin Howell</td>
                  <td>Left Wing</td>
                  <td>0</td>
                  <td>-5</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div></center>


    <?php } else if ($user->userRole === UserRoles::PLAYER || $user->userRole === UserRoles::PARENT) { ?>


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Welcome <?php echo $user->username; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Roster</a></li>
			<li><a href="#">Practice Schedule</a></li>
			<li><a href="#">Game Schedule</a></li>
			<li><a href="#">Statistics</a></li>
			<li><a href="#">Standings</a></li>
			<li><a href="<?php echo UrlHelper::genUrl('logout'); ?>">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
	<center><Label style >Player</label></center>
	<hr>
	<center><img src="public/images/1.png" class="img-responsive" alt="RAM" height="700" width="700" align="left"></center>
    
	<div class="table-responsive">
    <table class="table table-striped">
      <thead>
       <tr>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" align="center">
          <h1 class="page-header">Game Status</h1>
          <div class="row placeholders">
            <div class="placeholder">
              <h3>You are playing on the 1st line tonight</h3>
            </div>
          </div>
		 </div>
		</tr>
     </thead>
    </table>
    </div>
	
	<div class="table-responsive">
    <table class="table table-striped">
      <thead>
       <tr>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" align="center">
          <h1 class="page-header">Coach Advice</h1>
          <div class="row placeholders">
            <div class="placeholder">
			<h3>Lately you have been playing very well, just remember to stay out of the box, we can't afford to be short handed against the team tonight.</h3>
            </div>
          </div>
		 </div>
		</tr>
     </thead>
    </table>
    </div>

    <?php } ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

