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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="refresh" content="600">

  <title></title>
</head>

<body>
  <div class=graph><img src="mhsav-hour.png" alt="mhsav.png" /></div>
  <div class=graph><img src="mhsav-day.png" alt="mhsav.png" /><img src="mhsav-week.png" alt="mhsav.png" /></div>
  <div class=graph><img src="mhsav-month.png" alt="mhsav.png" /><img src="mhsav-year.png" alt="mhsav.png" /></div>
</body>
</html>
