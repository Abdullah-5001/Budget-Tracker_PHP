<?php
include_once "header.php";
$loggedIn = isset($_SESSION['user']['username']);
if (isset($_GET['signup']) && !$loggedIn) {
    include_once "registeration.php";
} elseif (isset($_GET['login']) && !$loggedIn) {
    include_once "login.php";
} else {
    include_once "hero_section.html"; 
    include_once "features.php";
    include_once "contact.php";
}

include_once "footer.html";
?>
