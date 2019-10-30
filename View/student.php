<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Index</title>
</head>
<body>
    <?php require 'includes/header.php'?>
    <?php foreach ($allStudents as $i => $student): ?>
    <section>
        <h4>Student <?php echo $i+1 ?>: <?php echo $student->getName(); ?></h4>
        <p>Email: <?php echo $student->getEmail(); ?></p>
        <p>Class: <?php echo $student->getClass(); ?></p>

    </section>
    <?php endforeach; ?>
    <?php require 'includes/footer.php'?>
</body>
</html>