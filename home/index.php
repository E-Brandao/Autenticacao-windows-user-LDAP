<?php
session_start();
// Se o usuário não está logado, redirecione para a página de login...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.php');
  exit();
}
?> 
<!doctype html>
<html lang="pt-br"> 
 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.png" />

  </head>

  <body>
    <div>
      <?php  
      echo $_SESSION['name'] . " " . $_SESSION['acesso'];
      ?>
    </div>  

    <!-- Custom js -->
    <script src="../assets/js/main.js"></script>
  </body>
</html>
