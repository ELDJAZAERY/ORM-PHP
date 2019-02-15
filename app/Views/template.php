<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="ELDJAZERY" />

    <title> <?= $this->_t; ?> </title>

  <!-- CSS -->
    <link rel="stylesheet" type="text/css" href=<?= URL.'src/css/style.css' ?> >
    <link rel="stylesheet" type="text/css" href=<?= URL."src/css/bootstrap.min.css"?> >
    <link rel="stylesheet" type="text/css" href=<?= URL."src/css/ie10-viewport-bug-workaround.css"?> >

  <!-- js -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src=<?= URL."src/js/ie10-viewport-bug-workaround.js"?> ></script>


  </head>
  <header style="margin-bottom:150px;">
        <h1>Header Template</h1>
        <p>Welcome to my site </p>
  </header>

  <?= $data['content'] ?>

  <footer style="margin-top:150px;">
     <p>Footer Template</p>
     <p>Created By ELDJAZAERY Ibrahim !!</p>
  </footer>
</html>
