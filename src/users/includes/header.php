<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../js/jquery-3.6.3.min.js"></script>


    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>
      
      <?php 

      if (basename($_SERVER['PHP_SELF'], '.php') == "admin")
      {
        echo "Admin Panel";  
      } 
      elseif (basename($_SERVER['PHP_SELF'], '.php') == "login")
      {
        echo "Login Page"; 
      }
      else
      {
        echo "Welcome"; 
      }

      ?>

    </title>
  </head>
  <body>
<script type="text/javascript">
  setTimeout(function(){
  if ($('div.alert').length > 0) {
    $('div.alert').remove();
  }
}, 5000)
</script>

<section class="container">
  <div class="mt-5">

