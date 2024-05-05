<?php
include_once"../Model/TaskClass.php";
include_once"../Model/ReadClass.php";

$Command=$_GET["Command"];

if ($Command=="Show"){
    $obj=new ReadTask();
    $arr=[];
    $arr=$obj->ListallTasks();
    return $arr;
}
if($Command=="Add"){
    include_once"../Model/CreateClass.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $title = $_POST["Title"];
        $description = $_POST["Description"];
        $due_date = $_POST["DueDate"];
        $status = $_POST["status"];
        $obj=new ReadTask();
        $task=new Task();
        $lastId = $obj->getLastId($task->filename,$task->separator);
        $id = $lastId + 1;
        $TaskInfo = "$id~$title~$description~$due_date~$status\n";}
    
    $obj = new Insert();
    $obj->InsertTask($TaskInfo);
}
if($Command=="Edit"){
    include_once"../Model/EditClass.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $title = $_POST["Title"];
        $description = $_POST["Description"];
        $due_date = $_POST["DueDate"];
        $status = $_POST["status"];
        
        $TaskInfo = "$id~$title~$description~$due_date~$status\n";}
    
    $obj = new Edit();
    $obj->EditTask($TaskInfo);
}

if($Command=="Delete"){
    include_once"../Model/DeleteClass.php";
    $obj=new Delete();
    $Task=new Task();
if (isset($_GET['id']) && $_GET['id'] !== '') {
    
    $id = $_GET['id'];
    
    $obj->deleteTask($id, $Task->filename,$Task->separator);
    header("Location: TaskView.php");
    exit(); 
}
}


?>