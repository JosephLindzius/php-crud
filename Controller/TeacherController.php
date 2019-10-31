<?php


class TeacherController
{
    public function render()
    {   require 'Model/Connect.php';
        $con = new Connect();
        $pdo = $con->openConnection();
        $teachers = $con->getFromTable($pdo, 'teacher');

        $teacherId = [];
        $allTeachers = [];
        foreach ($teachers as $teacher) {
            array_push($teacherId, $teacher['id']);
            $classroomName = $con->getClassroomName($pdo, $teacher['class']);
            $person = new Teacher($teacher['id'], $teacher['name'], $teacher['email'], $classroomName['name']);
            array_push($allTeachers,$person);
        }


        if (array_key_exists('name', $_POST) &&
            array_key_exists('email', $_POST) &&
            array_key_exists('class', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->addTeacher($pdo, $_POST['name'], $_POST['email'], $_POST['class']);
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //edit teacher
        if (array_key_exists('edit', $_POST)) {
            require 'Controller/EditController.php';
            $controller = new EditController();
            $_SESSION['teacher'] = 1;
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
        //delete teacher
        if(array_key_exists('delete',$_POST)){
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteById($pdo, 'teacher', $_POST['delete']);
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //deleteWholeTable
        if(array_key_exists('tableDelete', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteTable($pdo, 'teacher');
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //createWHOLETABLE
        if(array_key_exists('tableCreate', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->createTable($pdo, 'teacher');
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }


        require 'View/teacher.php';
    }

}