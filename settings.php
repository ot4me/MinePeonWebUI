<?php

$newpassword = $_POST['newpassword'];
$userTimeZone = $_POST['userTimeZone'];

if ($newpassword <> '') {

 
	$file = '/opt/minepeon/etc/uipassword';
	$content = 'minepeon:' . crypt($newpassword);

	file_put_contents($file, $content);

}

if ($userTimeZone <> '') {

 
	$file = '/opt/minepeon/etc/timezone';
	$content = $userTimeZone;

	file_put_contents($file, $content);

}

include('ssl.inc.php');
include('timezone.inc.php');

function formatOffset($offset) {
        $hours = $offset / 3600;
        $remainder = $offset % 3600;
        $sign = $hours > 0 ? '+' : '-';
        $hour = (int) abs($hours);
        $minutes = (int) abs($remainder / 60);

        if ($hour == 0 AND $minutes == 0) {
            $sign = ' ';
        }
        return $sign . str_pad($hour, 2, '0', STR_PAD_LEFT) .':'. str_pad($minutes,2, '0');

}

$utc = new DateTimeZone('UTC');
$dt = new DateTime('now', $utc);

$tzselect = '<select name="userTimeZone">';

foreach(DateTimeZone::listIdentifiers() as $tz) {
    $current_tz = new DateTimeZone($tz);
    $offset =  $current_tz->getOffset($dt);
    $transition =  $current_tz->getTransitions($dt->getTimestamp(), $dt->getTimestamp());
    $abbr = $transition[0]['abbr'];

	$selected = "";
	
	if ($timezone == $tz) {
		$selected = "selected";
	}
	
    $tzselect = $tzselect . '<option ' .$selected. ' value="' .$tz. '">' .$tz. ' [' .$abbr. ' '. formatOffset($offset). ']</option>';
}
$tzselect = $tzselect . '</select>';



if ($newpassword <> '') {

 
	$file = '/opt/minepeon/etc/uipassword';
	$content = 'minepeon:' . crypt($newpassword);

	file_put_contents($file, $content);

}

include('head.php');
include('menu.php');
?>
        <div class="container">
				<h1>Settings</h1>
				<form name="input" action="/settings.php" method="post">
					New Password: <input type="text" value="" name="newpassword">
					<input type="submit" value="Set"><br>
					TimeZone: <?php echo $tzselect ?>
					<input type="submit" value="Set"><br>
					</form>
					
        </div>
<?php

include('foot.php');