<?php
   session_start();
   session_destroy();

   // Redirect to index or login page, not the raw content page
   header("location:index.php"); 
   exit(); // Always put exit() after a header redirect!
?>
