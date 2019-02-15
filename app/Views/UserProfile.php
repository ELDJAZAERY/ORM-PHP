<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title> Home Page </title>
</head>
<body>
  <h1>  WELCOME TO Profile Page  </h1>

  <?php foreach ($users as $user):?>
  <h2><?= $user->getId(); ?></h2>
  <?php endforeach; ?>

</body>
<footer>

</footer>
</html>
