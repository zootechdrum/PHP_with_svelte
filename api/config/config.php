<?php

// $PRODUCTION_ENV = 'prod';
$PRODUCTION_ENV = 'dev';


// Used to define if the person who is logged in is an employee of Fleetwood.
define('EMPLOYEE', 99999);

//Dev connection server
if ($PRODUCTION_ENV === 'dev') {
    define('DB_HOST', '172.16.99.5');
    define('DB_USER', 'dev');
    define('DB_PASS', 'Manually8Select8Options');
    define('DB_NAME', 'est_snapshot_dev');

    define('DB_HOST_SQL', '192.168.1.33');
    define('DB_USER_SQL', 'sa');
    define('DB_USER_PASS_SQL', 'windows');
    define('DB_USER_NAME_SQL', 'Database=Snapshot');
    define('DB_SQLLIB', 'sqlsrv:server=');

    //Database for email server
    define('DB_HOST_MAIL', '192.168.1.28');
    define('DB_USER_MAIL', 'dev');
    define('DB_PASS_MAIL', 'Select1Account1needed');
    define('DB_NAME_MAIL', 'vmail_dev');

    define('APPROOT', dirname(dirname(__FILE__)));
    define('URLROOT', 'http://localhost/dealer_login/');
    define('SITENAME', 'Fleetwood Dealer Login');
} else {
    //Production servers
    define('DB_HOST', 'edi.fleetwoodusa.com');
    define('DB_USER', 'snapshot');
    define('DB_PASS', 'snapshot');
    define('DB_NAME', 'est_snapshot');

    define('DB_HOST_SQL', '192.168.1.6');
    define('DB_USER_SQL', 'sa');
    define('DB_USER_PASS_SQL', 'windows');
    define('DB_USER_NAME_SQL', 'dbname=Snapshot');
    define('DB_SQLLIB', 'dblib:host=');

    // //Database for email server
    define('DB_HOST_MAIL', '192.168.1.28');
    define('DB_USER_MAIL', 'root');
    define('DB_PASS_MAIL', 'Kona3800');
    define('DB_NAME_MAIL', 'vmail');

    define('APPROOT', dirname(dirname(__FILE__)));
    define('URLROOT', 'http://webdev.fleetwoodusa.com/dealer_login/');
    define('SITENAME', 'Fleetwood Dealer Login');
}
