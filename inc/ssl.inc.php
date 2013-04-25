<?php

if ( ! isset($_SERVER['HTTPS'])) {
   header('Location: https://' . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI']);
}
