<?php
require_once '../../libs/autoload.php';

$config_file_path = 'config.php';
$link = new Hybrid_Auth($config_file_path);

$adapter = $link->authenticate( "Twitter" );
$user_profile = $adapter->getUserProfile();
 
echo $link->getSessionData();
echo '<br><br><br><br>';
echo 'a:3:{s:40:"hauth_session.twitter.token.access_token";s:58:"s:50:"2614665530-ELRrGtcGM2Djk1yQtJ8iH41Vl5iX1gKpiEKW4Fh";";s:47:"hauth_session.twitter.token.access_token_secret";s:53:"s:45:"FSUrn2ObzaEeZxLzinXIbJsmQ65BntS1aKxhP9W1vSlHX";";s:34:"hauth_session.twitter.is_logged_in";s:4:"i:1;";}';
