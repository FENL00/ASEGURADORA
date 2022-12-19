<?php
  session_start();  
  error_reporting(0);
  if (!isset($_SESSION['permitido'])){
      header('Location: ../');	  
  }
?>
