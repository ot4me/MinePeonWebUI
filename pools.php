<?php

require('inc/cgminer.inc.php');

if (isset($_POST['URL0'])) {


	$newpool[0] = $_POST['URL0'] . ',' . $_POST['username0'] . ',' . $_POST['password0'];
	$newpool[1] = $_POST['URL1'] . ',' . $_POST['username1'] . ',' . $_POST['password1'];
	$newpool[2] = $_POST['URL2'] . ',' . $_POST['username2'] . ',' . $_POST['password2'];
	//$newpool[3] = $_POST['URL3'] . ',' . $_POST['username3'] . ',' . $_POST['password3'];
	//$newpool[4] = $_POST['URL4'] . ',' . $_POST['username4'] . ',' . $_POST['password4'];

/*	for ($i = 0; $i <= 5 ;$i++) {
		cgminer("disablepool", 0);
		cgminer("removepool", 1);
	}
*/

	cgminer("removepool", 0);
		sleep(1);
	cgminer("removepool", 0);
		sleep(1);
	cgminer("removepool", 0);
		sleep(1);
	cgminer("removepool", 0);
		sleep(1);
	cgminer("removepool", 0);
		sleep(1);
	cgminer("removepool", 0);
		sleep(1);
		
//	cgminer("addpool", "http://api.bitcoin.cz:8332/,MineForeman.REMOVE,REMOVE");
//		sleep(1);

	
	cgminer("addpool", "http://stratum.ozco.in:3333/,nrf.pps,pps");
		sleep(1);
	cgminer("addpool", "http://us.ozco.in:3333/,nrf.pps,pps");
		sleep(1);
	cgminer("addpool", "http://au.ozco.in:3333/,nrf.pps,pps");
		sleep(1);
	cgminer("switchpool", 1);
		sleep(1);
	cgminer("removepool", 0);
/*	
    cgminer("addpool", $newpool[0]);
    cgminer("addpool", $newpool[1]);
    cgminer("addpool", $newpool[2]);



		cgminer("switchpool", 1);
		cgminer("addpool", $newpool[1]);
		cgminer("addpool", $newpool[2]);

		cgminer("disablepool", 0);
		cgminer("removepool", 0);


	for ($i = 0; $i <= 2 ;$i++) {
		cgminer("addpool", $newpool[$i]);
		cgminer("disablepool", 0);
		cgminer("removepool", 0);
	}
	
	
	for ($i = 0; $i <= 2 ;$i++) {
		cgminer("addpool", $newpool[$i]);
		//cgminer("removepool", $i);
		//sleep(1);
		//cgminer("addpool", $newpool[$i]);
		//sleep(1);
	}	

	$responce = cgminer("removepool", 0);
	$responce = cgminer("removepool", 1);
	$responce = cgminer("removepool", 2);
	$responce = cgminer("removepool", 3);
	$responce = cgminer("removepool", 4);
	$responce = cgminer("removepool", 5);
	$responce = cgminer("removepool", 6);
	$responce = cgminer("removepool", 7);
	$responce = cgminer("removepool", 8);
	$responce = cgminer("removepool", 9); */

/*	$responce = cgminer("addpool", $newpool0);
	$responce = cgminer("addpool", $newpool1);
	$responce = cgminer("addpool", $newpool2);
	$responce = cgminer("addpool", $newpool3);
	$responce = cgminer("addpool", $newpool4); 

	cgminer("switchpool", 1);

	cgminer("removepool", 0);
*/
	cgminer("save", "/opt/minepeon/etc/miner.conf");

}

$pools = cgminer("pools", "");



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
			  <li><a href="/">Graphs</a></li>
              <li class="active"><a href="pools.php">Pools</a></li>
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

      <h1>Mining Pools<a name="settings">.</a></h1>
	  <form name="input" action="/pools.php" method="post">
	  URL: <input type="text" value="<?php echo $pools[POOLS][1][URL]; ?>" name="URL0">
	  Username: <input type="text" value="<?php echo $pools[POOLS][1][User]; ?>" name="username0">
	  Password: <input type="text" value="****" name="password0"><br>
	  URL: <input type="text" value="<?php echo $pools[POOLS][2][URL]; ?>" name="URL1">
	  Username: <input type="text" value="<?php echo $pools[POOLS][2][User]; ?>" name="username1">
	  Password: <input type="text" value="****" name="password1"><br>
	  URL: <input type="text" value="<?php echo $pools[POOLS][0][URL]; ?>" name="URL2">
	  Username: <input type="text" value="<?php echo $pools[POOLS][0][User]; ?>" name="username2">
	  Password: <input type="text" value="****" name="password2"><br>
	  <input type="submit" value="Submit">
	  </form>
      <p>Use this form to change to your own mining account!</p> 
	  <p>While I don't mind if you leave my details you will be mining 
	  using the MinePeon test account and any bitcoins generated will be concidered
	  a dontation to the MinePeon project.</p>

    </div><!-- /container -->


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
