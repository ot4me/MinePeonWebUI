<?php

require('inc/cgminer.inc.php');


// read the miner config file
$minerConf = file_get_contents("/opt/minepeon/etc/miner.conf", true);

// decode the json
$data = json_decode($minerConf, true);


if (!empty($_POST['URL0']) and !empty($_POST['USER0']) and !empty($_POST['PASS0'])) {

	// unset the pools
	unset($data['pools']);
	
	// Construct pool 0
	$pool = array(
		"url" => $_POST['URL0'],
		"user" => $_POST['USER0'],
		"pass" => $_POST['PASS0'],
	);
	
	// Set pool 0
	$data['pools'][0] = $pool;
	
	// echo $_POST['URL0'] . $_POST['USER0'] . $_POST['PASS0'] ;

	if (!empty($_POST['URL1']) and !empty($_POST['USER1']) and !empty($_POST['PASS1'])) {

		// Construct pool 1
		$pool = array(
			"url" => $_POST['URL1'],
			"user" => $_POST['USER1'],
			"pass" => $_POST['PASS1'],
		);
	
		// Set pool 1
		$data['pools'][1] = $pool;
	
		// echo $_POST['URL1'] . $_POST['USER1'] . $_POST['PASS1'] ;
		
		if (!empty($_POST['URL2']) and !empty($_POST['USER2']) and !empty($_POST['PASS2'])) {
		
			// Construct pool 2
			$pool = array(
				"url" => $_POST['URL2'],
				"user" => $_POST['USER2'],
				"pass" => $_POST['PASS2'],
			);
	
			// Set pool 2
			$data['pools'][2] = $pool;
		
			// echo $_POST['URL2'] . $_POST['USER2'] . $_POST['PASS2'] ;
		
		}
	}
	
	// Recode into JSON and save
	file_put_contents("/opt/minepeon/etc/miner.conf", json_encode($data));
	cgminer("restart");
	sleep(60);
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
	  URL: <input type="text" value="<?php echo $data['pools'][0]['url']; ?>" name="URL0">
	  Username: <input type="text" value="<?php echo $data['pools'][0]['user']; ?>" name="USER0">
	  Password: <input type="text" value="<?php echo $data['pools'][0]['pass']; ?>" name="PASS0"><br>
	  URL: <input type="text" value="<?php echo $data['pools'][1]['url']; ?>" name="URL1">
	  Username: <input type="text" value="<?php echo $data['pools'][1]['user']; ?>" name="USER1">
	  Password: <input type="text" value="<?php echo $data['pools'][1]['pass']; ?>" name="PASS1"><br>
	  URL: <input type="text" value="<?php echo $data['pools'][2]['url']; ?>" name="URL2">
	  Username: <input type="text" value="<?php echo $data['pools'][2]['user']; ?>" name="USER2">
	  Password: <input type="text" value="<?php echo $data['pools'][2]['pass']; ?>" name="PASS2"><br>
	  <input type="submit" value="Submit">
	  </form>
      <p>Use this form to change to your own mining accounts!  Pressing submit will take 60 seconds as the miner restarts with the new configuration.</p> 
	  <p><b>WARNING:</b> There is very little validation on these settings at the moment so make sure your settings are correct!</p>
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
