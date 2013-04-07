<?php


create_graph("mhsav-hour.png", "-1h", "Hourly");
create_graph("mhsav-day.png", "-1d", "Daily");
create_graph("mhsav-week.png", "-1w", "Weekly");
create_graph("mhsav-month.png", "-1m", "Monthly");
create_graph("mhsav-year.png", "-1y", "Yearly");
  
function create_graph($output, $start, $title) {
  $RRDPATH = '/opt/minepeon/http/rrd/';
  $options = array(
    "--slope-mode",
    "--start", $start,
    "--title=$title",
    "--vertical-label=Hash per seccond",
    "--lower=0",
    "DEF:myghsav=" . $RRDPATH . "mhsav.rrd:mhsav:AVERAGE",
    "CDEF:realspeed=myghsav,1000,*",
    "LINE2:realspeed#FF0000"
  );

  $ret = rrd_graph($RRDPATH . $output, $options);
  if (! $ret) {
    echo "<b>Graph error: </b>".rrd_error()."\n";
  }
}




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MinePeon, from MineForeman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta http-equiv="refresh" content="600">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/bootstrap-minepeon.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons 
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="ico/favicon.png">-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="http://mineforeman.com/minepeon/">MinePeon</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
			  <li class="active"><a href="/">Graphs</a></li>
              <li><a href="pools.php">Pools</a></li>
			  <li><a href="miner.php">Stats</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
			  <li><a href="#license">License</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


	
	<div class="container">
		<h1>Graphs<a name="graphs">.</a></h1>
		<div class=graph><img src="rrd/mhsav-hour.png" alt="mhsav.png" /></div>
		<div class=graph><img src="rrd/mhsav-day.png" alt="mhsav.png" /><img src="rrd/mhsav-week.png" alt="mhsav.png" /></div>
		<div class=graph><img src="rrd/mhsav-month.png" alt="mhsav.png" /><img src="rrd/mhsav-year.png" alt="mhsav.png" /></div>
	</div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
