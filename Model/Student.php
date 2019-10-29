<?php


class Student
{
    private $id;
    private $name;
    private $email;
    private $class;

    /**
     * StudentController constructor.
     * @param $name
     * @param $email
     * @param $class
     */
    public function __construct($name, $email, $class)
    {
        $this->name = $name;
        $this->email = $email;
        $this->class = $class;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param int $class
     */
    public function setClass($class): void
    {
        $this->class = $class;
    }

}