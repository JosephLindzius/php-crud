<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Becode | Overview</title>
</head>
<body>
    <?php require 'includes/header.php'?>
    <section>
        <h2>You can see overview of the database in this page.</h2>
        <h2>Students</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allStudents as $student): ?>
                <tr>
                    <th><?php echo $student->getId(); ?></th>
                    <td><?php echo $student->getName(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section>
        <h2>Teachers</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allTeachers as $teacher): ?>
                <tr>
                    <th><?php echo $teacher->getId(); ?></th>
                    <td><?php echo $teacher->getName(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section>
        <h2>Classrooms</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allClassrooms as $classroom): ?>
                <tr>
                    <th><?php echo $classroom->getId(); ?></th>
                    <td><?php echo $classroom->getName(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <?php require 'includes/footer.php'?>
</body>
</html>
