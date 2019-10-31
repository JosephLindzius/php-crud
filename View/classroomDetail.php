<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>
<body>
<?php require 'includes/header.php';
require  'includes/navbar.php';
?>

<section class="m-5">
    <p>You can see the class <strong><?php echo  $class->getName() ?></strong>'s detail in this page.</p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <button type="button" class="btn btn-outline-dark btn-sm" name="edit" value="<?php echo $class->getId(); ?>">Edit</button>
            <button type="button" class="btn btn-outline-dark btn-sm" name="delete" value="<?php echo $class->getId(); ?>">Delete</button>
        </li>
        <li class="list-group-item"><span class="badge badge-info">ID</span> : <?php echo $class->getId(); ?></li>
        <li class="list-group-item"><span class="badge badge-info">NAME</span> : <?php echo $class->getName(); ?></li>
        <li class="list-group-item"><span class="badge badge-info">E-MAIL</span> : <?php echo $class->getLocation()?></li>

        <li class="list-group-item"><span class="badge badge-info">TEACHER(S)</span> :
            <?php foreach ($teachers AS $teacher){
            echo "<a href='#'>" . $teacher->getName() . "</a>" . " ";
            }?>
        </li>
        <li class="list-group-item"><span class="badge badge-info">STUDENT(S)</span> :
            <?php foreach ($students AS $student){
                echo "<a href='#'>" . $student->getName() . "</a>" . " ";
            }?>
        </li>

    </ul>
</section>


<?php require 'includes/footer.php'?>
</body>
</html>