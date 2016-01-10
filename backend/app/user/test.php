<?php
require '../../libs/autoload.php';
$config_file_path = '../../libs/hybridauth/hybridauth/hybridauth/config.php';
$link = new Hybrid_Auth($config_file_path);	
 $adapter = $link->authenticate( "Twitter" );
 $user_profile = $adapter->getUserProfile();
 
 echo "user: " . $user_profile->displayName;
?>