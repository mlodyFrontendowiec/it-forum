<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum IT</title>
  <link rel="stylesheet" href="style/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/login.css">
  <link rel="stylesheet" href="../css/forum.css">
  <link rel="icon" href="../assets/it.svg" sizes="any" type="image/svg+xml">
</head>



<body style="background-color:#92badd ;">


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="/assets/it.svg" width="44" height="44" alt="Logo">
        IT FORUM
      </a>

      <button class="navbar-toggler e-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="/">Strona główna</a>
          <a class="nav-link" href="/?action=articles">Artykuły</a>
          <a class="nav-link" href="/?action=reviews">Recenzje</a>
          <a class="nav-link" href="/?action=forum">Forum</a>
          <?php session_start(); if (!isset($_SESSION['user'])):
          ?>
          <a class="nav-link" href="/?action=login">Logowanie</a>
          <a class="nav-link" href="/?action=register">Rejstracja</a>
          <?php else:?>
          <a class="nav-link" href="/?action=logout">Wyloguj</a>
          <?php endif; ?>
        </div>
      </div>

    </div>

  </nav>

  <?php require_once("pages/$page.php")?>


</body>

</html>