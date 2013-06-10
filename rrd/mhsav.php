<?php

include('timezone.inc.php');

$RRDPATH = '/opt/minepeon/http/rrd';

require('miner.inc.php');

if (!file_exists($RRDPATH . "/mhsav.rrd")) {

	$options = array(
		"--step", "300",        
		"--start", "-12 months",    
		"DS:mhsav:GAUGE:600:0:U",
		"RRA:AVERAGE:0.5:1:288",
		"RRA:AVERAGE:0.5:12:168",
		"RRA:AVERAGE:0.5:228:365",
	);

	rrd_create($RRDPATH . "/mhsav.rrd", $options);
	// echo rrd_error();
}



$t = time();

$return = cgminer("summary", "");

$HSav = $return['SUMMARY'][0]['MHSav'] * 1000;

$mhsav = $t . ':' . $HSav;

$update = array(
	$mhsav
);

// echo $mhsav;


$ret = rrd_update($RRDPATH . "/mhsav.rrd", $update);
// echo $mhsav;
?>
