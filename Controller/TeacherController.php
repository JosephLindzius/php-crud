<?php


class TeacherController
{
    public function render()
    {   require 'Model/Connect.php';
        $con = new Connect();
        $pdo = $con->openConnection();
        $teachers = $con->getFromTable($pdo, 'teacher');

        $allTeachers = [];
        foreach ($teachers as $teacher) {
            $person = new Teacher($teacher['id'], $teacher['name'], $teacher['email'], $teacher['class']);
            array_push($allTeachers,$person);
        }

        //edit student
        if (array_key_exists('edit', $_POST)) {
            require 'Controller/EditController.php';
            $controller = new EditController();
            $controller->render('teacher', $_POST["edit"]);
        }
        if (array_key_exists('confirm', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->updateTeacher($pdo, $_SESSION['editId'], $_POST['editName'], $_POST['editEmail'], $_POST['editClass']);
            $_POST = [];
            $_SESSION = [];;
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        require 'View/teacher.php';
    }

}