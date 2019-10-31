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
    <p>You can a <strong><?php echo $status . " " . $user->getName() ?></strong>'s detail in this page.</p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <button type="button" class="btn btn-outline-dark btn-sm" name="edit" value="<?php echo $user->getId(); ?>">Edit</button>
            <button type="button" class="btn btn-outline-dark btn-sm" name="delete" value="<?php echo $user->getId(); ?>">Delete</button>
        </li>
        <li class="list-group-item"><span class="badge badge-info">ID</span> : <?php echo $user->getId(); ?></li>
        <li class="list-group-item"><span class="badge badge-info">NAME</span> : <?php echo $user->getName(); ?></li>
        <li class="list-group-item"><span class="badge badge-info">E-MAIL</span> : <?php echo $user->getEmail()?></li>
        <li class="list-group-item"><span class="badge badge-info">CLASS</span> : <?php echo $classroom['name'] ?></li>
        <?php
        if ($status = "student"){
            echo "<li class=\"list-group-item\"><span class=\"badge badge-info\">Assigned teacher</span> : Take all teachers name, put in in the link(to their profile)</li>";
        } else {
            echo "<li class=\"list-group-item\"><span class=\"badge badge-info\">List of all assigned students</span> : Take all the name (in list), put in in the link(to their profile) </li>";
        }
        ?>




    </ul>
</section>


<?php require 'includes/footer.php'?>
</body>
</html>