
<?php
session_start();
require_once('Facebook/autoload.php');

$FBObject = new \Facebook\Facebook([
'app_id' => '1086439651767452',
'app_secret' => '51d0d7b4028d643f39423dc923df8aa8',
'default_graph_version' => 'v2.10'
]);

$handler = $FBObject -> getRedirectLoginHelper();
?>
