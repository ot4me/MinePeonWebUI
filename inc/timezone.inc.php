<?php

$timezone = file_get_contents("/opt/minepeon/etc/timezone");

//$timezone = "Pacific/Auckland";

ini_set( 'date.timezone', $timezone );

putenv("TZ=" . $timezone);

date_default_timezone_set($timezone);

