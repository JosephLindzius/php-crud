<?php

class Classroom
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }
        private $id;
        private $name;
        private $location;

    /**
     * Classroom constructor.
     * @param $id
     * @param $name
     * @param $location
     */
    public function __construct($id, $name, $location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
    }

    public function dataBase ($name, $location)
    {
        $this->name = $name;
        $this->location = $location;
    }


}



