<?php
//property
class student{
    public $id;
    public $name;
    public $age;
//function
    function __construct($id, $name, $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }
//method
    function set_id($id)
    {
        $this->id = $id;
    }
    
    function get_id()
    {
        return $this->id;
    }

    function set_name($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_age($age)
    {
        $this->age = $age;
    }
    
    function get_age()
    {
        return $this->age;
    }
}
?>
