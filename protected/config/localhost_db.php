<?php
// This is the database connection configuration.
return array(
    /*
      'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
     */
    // uncomment the following lines to use a MySQL database
    'connectionString' => 'mysql:host=localhost;dbname=hotel',
    'enableParamLogging' => true,
    'enableProfiling'=>true,
    'emulatePrepare' => true,
    'tablePrefix' => '',
    'username' => 'hotel',
    'password' => 'pass_to_hotel',
    'charset' => 'utf8',
);
