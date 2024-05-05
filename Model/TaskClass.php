<?php

class Task{

private $id; 
private $title;
private $description;
private $due_date;
private $status;
public $filename;
public $separator;

public function __construct() {
    $this->filename="../Tasks.txt";
    $this->separator="~";
}

// Getters and Setters
public function getid() {
    return $this->id;
}

public function setid($id) {
    $this->id = $id;
}
public function getTitle() {
    return $this->title;
}

public function setTitle($title) {
    $this->title = $title;
}

public function getDescription() {
    return $this->description;
}

public function setDescription($description) {
    $this->description = $description;
}

public function getDueDate() {
    return $this->due_date;
}

public function setDueDate($due_date) {
    $this->due_date = $due_date;
}

public function getStatus() {
    return $this->status;
}

public function setStatus($status) {
    $this->status = $status;
}

}


?>