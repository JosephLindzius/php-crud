<?php

class Classroom
{
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



