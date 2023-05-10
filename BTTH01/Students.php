<?php
class sinhvien {
    private $id;
    private $name;
    private $age;

    public function __construct($id, $name, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }
    
    public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->maSV = $id;
    }

    public function getname() {
        return $this->ten;
    }

    public function setname($name) {
        $this->ten = $ten;
    }

    public function getage() {
        return $this->ngaySinh;
    }

    public function setage($age) {
        $this->ngaySinh = $age;
    }   
}

class StudentDAO{
    private $StudentsDAO;
    
    public function __construct(){
         $this->StudentsDAO = array();
        }
    
    public function them($sinhvien){
        array_push($this->StudentsDAO, $sinhvien);
    }
    
    }