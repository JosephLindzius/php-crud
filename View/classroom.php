<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Becode - Boiler plate MVC</title>
</head>
<body>
<?php require 'includes/header.php'?>
<?php foreach ($allClasses as $class): ?>
    <section>
        <h4>Class <?php echo $class->getId(); ?>: <?php echo $class->getName(); ?></h4>
        <p>Location: <?php echo $class->getLocation(); ?></p>
    </section>
<?php endforeach; ?>
<form action="#" method="POST">
    name<input type="text" name="name">
    location<input type="text" name="location">
    <input type="submit">
</form>
<?php require 'includes/footer.php'?>
</body>
</html>