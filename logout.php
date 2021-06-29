<?php
include('google-sign-in.php');

$Goo_client->revokeToken();
session_destroy();

header('Location:index.php');
?>