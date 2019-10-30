<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Teacher</title>
</head>
<body>
    <?php require 'includes/header.php'?>
    <section>
        <p>You can see all the teachers in this page.</p>

        <div class="text-right mb-2">
            <form action="#" method="POST">
                name : <input type="text" name="name">
                Email : <input type="text" name="email">
                Class : <input type="text" name="class">
                <button type="button" name="new" class="btn btn-secondary btn-sm align-right">Add a New Teacher</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Class</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allTeachers as $teacher): ?>

            <tr>
                <th><?php echo $teacher->getId(); ?></th>
                <td><?php echo $teacher->getName(); ?></td>
                <td><?php echo $teacher->getEmail()?></td>
                <td><?php echo $teacher->getClass()?></td>
                <td><button type="button" class="btn btn-outline-dark btn-sm" name="edit">Edit</button></td>
                <td><button type="button" class="btn btn-outline-dark btn-sm" name="delete">Delete</button></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </section>
    <?php require 'includes/footer.php'?>
</body>
</html>