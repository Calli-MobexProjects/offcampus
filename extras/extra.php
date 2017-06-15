<?php
 ini_set( 'error_reporting', E_ALL);
  ini_set( 'display_errors', true );
  $file = "/var/www/html/offcampus/json/districts.json";
  if (file_exists($file))
   {
     echo "the file $file exists";
   } 
   else{
    echo "the file $file does not exists";
   }

   $handle = fopen($file, "w") or die("Can't open file");
   fwrite($handle, "Yoriyori");
   fclose($handle);
 ?>