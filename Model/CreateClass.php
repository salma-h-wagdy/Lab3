<?php
 include_once"TaskClass.php";
 
class Insert{
   

    function InsertTask($TaskInfo)
    {
            $task = new Task();
            $file = fopen($task->filename, "a+") or die("Unable to open file!");
            fwrite($file, $TaskInfo);
            fclose($file);
            header("Location:../View/TaskView.php");
            exit();
           
        
    }

}

?>