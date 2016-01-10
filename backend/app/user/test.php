<?php
require
$config_file_path = '../../lib/hybridauth/config.php';
$link = new Hybrid_Auth($config_file_path);
 $adapter = $link->authenticate( "Twitter" );
 $user_profile = $adapter->getUserProfile();
 
 echo "user: " . $user_profile->displayName;
?>