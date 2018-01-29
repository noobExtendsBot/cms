<?php
  // This is a good way to connect to db but we can do better
  // $username = "root";
  // $password = "";
  // $dbName = "cms";
  // $hostName = "localhost:3305";
  //
  // $connection = mysqli_connect($hostName,$username,$password,$dbName);
  // if(!$connection){
  //   die("could not connect to database");
  // }
  // else{
  //   echo "Welcome";
  // }

  $db['db_name'] = 'cms';
  $db['db_password'] = '';
  $db['db_user'] = 'root';
  $db['db_host'] = 'localhost:3305';

  foreach ($db as $key => $value) {
    define(strtoupper($key),$value);
  }
  $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  if(!$connection){
    die("Could not connect to Database");
  }
?>
